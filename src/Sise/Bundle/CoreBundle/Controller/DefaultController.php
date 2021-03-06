<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Loader;
use Sise\Bundle\CoreBundle\Form\Search\SearchType;
use Sise\Bundle\CoreBundle\Entity\CoreProject;

class DefaultController extends Controller
{

    public function selectCodeRecAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'Select R
        from  SiseCoreBundle:NomenclatureRecensement  R'
        );
        $items = $query->getResult();


        return $this->render('SiseCoreBundle:Default:codeRec.html.twig', array('items' => $items));
    }

    public function setCodeRecAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $CodeRece = '';
            $CodeRece = $request->get('CodeRece');
            if ($CodeRece != '') {
                $items = explode("|", $CodeRece);
                $session->set("CodeRece", $items[0]);
                $session->set("AnneScol", $items[1]);
                $session->set("LibeReceAr", $items[2]);
            }
            $response = new Response();
            $data = json_encode(array($session->get('CodeRece'), $session->get('AnneScol'))); // c'est pour formater la réponse de la requete en format que jquery va comprendre
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent($data);
            return $response;
        }

        return new Response($request->get('CodeRece'));
    }


    public function  listEntitiesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaires = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findAll();

        foreach ($questionnaires as $questionnaire) {

            $questionnaire->setRouteclass(strtolower(str_replace('_', '', $questionnaire->getNameclass())));
            $em->persist($questionnaire);
            $em->flush();
        }

        die;

    }

    public function indexAction()
    {


        $usr = $this->get('security.context')->getToken()->getUser();

        return $this->render('SiseCoreBundle:Default:index.html.twig');
    }


    /**
     * Lists all Menu entities.
     *
     */
    public function menuAction($PageContext, $TitleContextValue, $RouteAction)
    {
        //Button visibility
        $TdExporter = false;
        $TdNouveau = false;
        $TdRetour = false;
        $TdEditer = false;
        $TdAnnuler = false;
        $TdSupprimer = false;
        $TdValider = false;
        $TdRechercher = false;
        $TdCloturer = false;
        switch ($PageContext) {
            case 'register':
                //Mode New
                $TdRetour = true;
                $TdAnnuler = true;
                $TdValider = true;
                break;
            case 'List':
                //Mode List
                $TdExporter = true;
                $TdNouveau = true;
                break;
            case 'ListNome':
                //Mode List
                $TdExporter = true;
                break;
            case 'ListFind':
                // Mode List avec un boutton de recherche
                $TdExporter = true;
                $TdNouveau = true;
                $TdRechercher = true;
                break;
            case 'Edit':
                //Mode Edition
                $TdRetour = true;
                $TdValider = true;
                $TdSupprimer = true;
                break;
            case 'EditSansSupp':
                //Mode Edition
                $TdRetour = true;
                $TdValider = true;
                break;
            case 'New':
                //Mode New
                $TdRetour = true;
                $TdAnnuler = true;
                $TdValider = true;
                break;
            Case 'ConsQues':
                $TdRetour = true;
                $TdEditer = true;
                $TdExporter = true;
                break;
            Case 'EditQues':
                $TdRetour = true;
                $TdValider = true;
                break;
            Case 'ValiQues':
                $TdCloturer = true;
                break;
        };
        return $this->render('SiseCoreBundle:Default:menu.html.twig',
            array('TitleContextValue' => $TitleContextValue,
                'TdExporter' => $TdExporter,
                'TdNouveau' => $TdNouveau,
                'TdRetour' => $TdRetour,
                'TdEditer' => $TdEditer,
                'TdAnnuler' => $TdAnnuler,
                'TdSupprimer' => $TdSupprimer,
                'TdValider' => $TdValider,
                'TdRechercher' => $TdRechercher,
                'TdCloturer' => $TdCloturer
            ));
    }


    public function searchAction(Request $request)
    {
        // Generation of the form
        $em = $this->getDoctrine()->getManager();
        $user= $this->get('security.context')->getToken()->getUser();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();

        // return the form view
        return $this->render('SiseCoreBundle:Default:search.html.twig', array(
            'form' => $search->createView(),
        ));
    }

    public function searchetabAction(Request $request)
    {
        // Generation of the form
        $em = $this->getDoctrine()->getManager();
        $user= $this->get('security.context')->getToken()->getUser();
        $session = $request->getSession();
        $form = $this->container->get('form.factory')->createBuilder(new SearchEtabType($session, $em, $user))->getForm();

        // return the form view
        return $this->render('SiseCoreBundle:Default:searchetab.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function searchpersonnelAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user= $this->get('security.context')->getToken()->getUser();
        $session = $request->getSession();
        // Generation of the form
        $form = $this->container->get('form.factory')->createBuilder(new SearchPersonnelType($session, $em, $user))->getForm();

        // return the form view
        return $this->render('SiseCoreBundle:Default:searchPersonnel.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function getListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $codegouv = '';
            $entity = '';
            $previous_select = '';
            $codegouv = $request->get('codegouv');
            $entity = $request->get('entity');
            $previous_select = $request->get('previous_select');
            if ($codegouv != '' and $entity != '' and $previous_select != '') {
                if ($entity == 'NomenclatureDelegation') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findByCodecircregi($codegouv);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodedele();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibedelear();
                        $i++;
                    }
                } elseif ($entity == 'NomenclatureTypeetablissement') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findByConcrece(1);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodetypeetab();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibetypeetabar();
                        $i++;
                    }
                    $session->set("codedele", $codegouv);
                } elseif ($entity == 'NomenclatureEtablissement') {
                    // $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findByCodetypeetab($codegouv);
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array("codetypeetab" => $codegouv, "codedele" => $session->get("codedele")));
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodeetab();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getCodeetab() . ' | ' . $nomenclatureDelegation->getLibeetabar();
                        $i++;
                    }
                    $session->set("codetypeetab", $codegouv);
                }elseif ($entity == 'NomenclatureEtablissementType') {
                    // $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findByCodetypeetab($codegouv);
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array("codetypeetab" => $codegouv));
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodeetab();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getCodeetab() . ' | ' . $nomenclatureDelegation->getLibeetabar();
                        $i++;
                    }
                    $session->set("codetypeetab", $codegouv);
                }elseif ($entity == 'NomenclatureCirconscription') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureCirconscription')->findByCodedele($codegouv);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodecirc();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibecircar();
                        $i++;
                    }
                } elseif ($entity == 'NomenclatureDisposition') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureDisposition')->findByCodesitufonc($codegouv);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodetypedisp();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibetypedispar();
                        $i++;
                    }
                } elseif ($entity == 'CodeEtab') {
                    $nomenclatureDelegation = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneByCodeetab($codegouv);;
                    $json = array();
                    $json['code'] = $nomenclatureDelegation->getCodeetab();
                    $json['libelle'] = $nomenclatureDelegation->getLibeetabar();
                    $session->set("codeetab", $nomenclatureDelegation->getCodeetab());
                }
                $response = new Response();
                $data = json_encode($json); // c'est pour formater la réponse de la requete en format que jquery va comprendre
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }

        }
        return new Response('Erreur');
    }


    public function getListMultiAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $codegouv = '';
            $entity1 = '';
            $entity2 = '';
            $previous_select = '';
            $previous_select2 = '';
            $codegouv = $request->get('codegouv');
            $entity1 = $request->get('entity1');
            $entity2 = $request->get('entity2');
            $previous_select1 = $request->get('previous_select1');
            $previous_select2 = $request->get('previous_select2');
            if ($codegouv != '' and $entity1 != '' and $entity2 != '' and $previous_select1 != '' and $previous_select2 != '') {
                if ($entity1 == 'NomenclatureDelegation' and $entity2 == 'NomenclatureCirconscription') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findByCodecircregi($codegouv);
                    $nomenclatureCirconscriptions = $em->getRepository('SiseCoreBundle:NomenclatureCirconscription')->findByCodegouv($codegouv);
                    $json[$entity1] = array();
                    $json[$entity2] = array();
                    $json[$entity1][0]['code'] = '';
                    $json[$entity1][0]['libelle'] = '-- اختيار --';
                    $json[$entity2][0]['code'] = '';
                    $json[$entity2][0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$entity1][$i]['code'] = $nomenclatureDelegation->getCodedele();
                        $json[$entity1][$i]['libelle'] = $nomenclatureDelegation->getLibedelear();
                        $i++;
                    }
                    foreach ($nomenclatureCirconscriptions as $nomenclatureCirconscription) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$entity2][$i]['code'] = $nomenclatureCirconscription->getCodecirc();
                        $json[$entity2][$i]['libelle'] = $nomenclatureCirconscription->getLibecircar();
                        $i++;
                    }
                }

                $response = new Response();
                $data = json_encode($json); // c'est pour formater la réponse de la requete en format que jquery va comprendre
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }

        }
        return new Response('Erreur');
    }

}
