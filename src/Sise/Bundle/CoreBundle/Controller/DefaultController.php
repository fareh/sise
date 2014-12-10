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
        $entities = array();
        $em = $this->getDoctrine()->getManager();
        $meta = $em->getMetadataFactory()->getAllMetadata();
        foreach ($meta as $key => $m) {
            $entity = new CoreProject();
            $entity->setEntity($m->getName());
            $entity->setTableName($m->getTableName());
            $em->persist($entity);
            $em->flush();
            $entities[$key]['name'] = $m->getName();
            $entities[$key]['tableName'] = $m->getTableName();
        }

        die;


    }

    public function indexAction()
    {


        $usr= $this->get('security.context')->getToken()->getUser();

        return $this->render('SiseCoreBundle:Default:index.html.twig');
    }



    /**
     * Lists all Menu entities.
     *
     */
    public function menuAction($PageContext, $TitleContextValue, $RouteAction)
    {
        //
        $TdExporter = false;
        $TdNouveau = false;
        $TdRetour = false;
        $TdEditer = false;
        $TdAnnuler = false;
        $TdSupprimer = false;
        $TdValider = false;
        $TdRechercher = false;
        $TdCloturer = false;
        //
        $RouteExporter = '';
        $RouteNouveau = '';
        $RouteRetour = '';
        $RouteEditer = '';
        $RouteAnnuler = '';
        $RouteSupprimer = '';
        $RouteValider = '';
        $RouteRechercher = '';
        $RouteCloturer = '';


        switch ($PageContext) {
            case 'List':
                //Mode List
                $TdExporter = true;
                $TdNouveau = true;
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
            case 'New':
                //Mode New
                $TdRetour = true;
                $TdAnnuler = true;
                $TdValider = true;
                break;
            Case 'ConsQues':
                $TdRetour = true;
                $TdEditer = true;

            Case 'EditQues':
                $TdRetour = true;
                $TdValider = true;

            Case 'ValiQues':
                $TdCloturer = true;
        };


        if ($TdExporter == true) $RouteExporter = $RouteAction . '_export';
        if ($TdNouveau == true) $RouteNouveau = $RouteAction . '_new';
        if ($TdRechercher == true) $RouteRechercher = $RouteAction . '';
        if ($TdRetour == true) $RouteRetour = $RouteAction . '';
        if ($TdEditer == true) $RouteEditer = $RouteAction . '_edit';
        if ($TdAnnuler == true) $RouteAnnuler = $RouteAction . '_new';
        if ($TdSupprimer == true) $RouteSupprimer = $RouteAction . '_delete';
        if ($TdValider == true) $RouteValider = '_create';
        if ($TdCloturer == true) $RouteCloturer = $RouteAction . '';


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
                'TdCloturer' => $TdCloturer,
                'Route' => array('Exporter' => $RouteExporter,
                    'Nouveau' => $RouteNouveau,
                    'Rechercher' => $RouteRechercher,
                    'Retour' => $RouteRetour,
                    'Editer' => $RouteEditer,
                    'Annuler' => $RouteAnnuler,
                    'Supprimer' => $RouteSupprimer,
                    'Valider' => $RouteValider,
                    'Cloturer' => $RouteCloturer)
            ));


    }


    public function searchAction()
    {
        // Generation of the form
        $form = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();

        // return the form view
        return $this->render('SiseCoreBundle:Default:search.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function searchetabAction()
    {
        // Generation of the form
        $form = $this->container->get('form.factory')->createBuilder(new SearchEtabType())->getForm();

        // return the form view
        return $this->render('SiseCoreBundle:Default:searchetab.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function getListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
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
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findByCodegouv($codegouv);
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
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findByConcrece(10);
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
                } elseif ($entity == 'NomenclatureEtablissement') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findByCodetypeetab($codegouv);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodeetab();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibeetabar();
                        $i++;
                    }
                } elseif ($entity == 'NomenclatureCirconscription') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureCirconscription')->findByCodecirc($codegouv);
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
                } elseif ($entity == 'CodeEtab') {
                    $nomenclatureDelegation = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneByCodeetab($codegouv);
                    $json = array();
                    $json['code'] = $nomenclatureDelegation->getCodeetab();
                    $json['libelle'] = $nomenclatureDelegation->getLibeetabar();
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
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findByCodegouv($codegouv);
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
