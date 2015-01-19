<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 15/12/2014
 * Time: 15:02
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveNouveauseptiemeannee;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Form\EffectiveeleveNouveauseptiemeanneeType;


/**
 * EffectiveeleveNouveauseptiemeannee controller.
 *
 */
class EffectiveeleveNouveauseptiemeanneeController extends Controller
{

    /**
     * Displays a form to edit an existing EffectiveeleveNouveauseptiemeannee entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveelevenouveauseptiemeannee_edit');
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNouveauseptiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            if (count($entities) > 0) {
                foreach ($entities as $key => $item) {
                    $editForms[$key] = $this->createEditForm($item, $key)->createView();
                }
            } else {
                $editForms[1] = $this->createEditForm(new EffectiveeleveNouveauseptiemeannee(), 1)->createView();
            }

            $pathUpdate = $this->generateUrl('effectiveelevenouveauseptiemeannee_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_nouveauseptiemeannee');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_nouveauseptiemeannee.html.twig', array(
            'entities' => @$entities,
            'editForms' => @$editForms,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    private function createEditForm(EffectiveeleveNouveauseptiemeannee $entity, $key)
    {
        $form = $this->createForm(new EffectiveeleveNouveauseptiemeanneeType($key), $entity);
        return $form;
    }


    public  function itemAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $newcompteur = '';
            $newcompteur = $request->get('newcompteur');
            if ($newcompteur != '') {
                $form = $this->createEditForm(new EffectiveeleveNouveauseptiemeannee(), $newcompteur)->createView();
                return $this->render('SiseCoreBundle:Default:prototype_nouveauseptiemeannee.html.twig', array(
                    'form' => @$form,
                ));


            }else{
                return new Response("Ereeur");
            }

        }

        return new Response("Ereeur");
    }

    public function deleteItemAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $em = $this->getDoctrine()->getManager();
            $session = $request->getSession();
            $codeetab =  $session->get('codeetab') ;
            $codetypeetab = $session->get('codetypeetab');
            $annescol = $session->get('AnneScol');
            $coderece = $session->get('CodeRece');
            $codeetabsour = "";
            $codetypeetabsour = "";
            $codeetabsour = $request->get('codeetabsour');
            $codetypeetabsour = $request->get('codetypeetabsour');
            if ($codeetab != '' and  $codetypeetab != '' and  $annescol != '' and  $coderece != '' and  $codetypeetabsour != '' and  $codeetabsour != ''  ) {
                $item = $em->getRepository('SiseCoreBundle:EffectiveeleveNouveauseptiemeannee')->findOneBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece, 'codeetabsour' => $codeetabsour, 'codetypeetabsour' => $codetypeetabsour));
                if (!$item) {
                    throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
                }
                $em->remove($item);
                $em->flush();
                $response = new Response();
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent( json_encode(array(
                    'success' => true,
                    'data'    => "" // Your data here
                )));
                return $response;


            }else{
                $response = new Response();
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent( json_encode(array(
                    'success' => true,
                    'data'    => "" // Your data here
                )));
                return $response;

            }

        }
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent( json_encode(array(
            'success' => false,
            'data'    => "" // Your data here
        )));
        return $response;

    }

    /**
     * Edits an existing EffectiveeleveNouveauseptiemeannee entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectiveelevenouveauseptiemeannee_edit');
        $pathUpdate = $this->generateUrl('effectiveelevenouveauseptiemeannee_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNouveauseptiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            foreach ($request->request as $key => $parameters) {
                $item = $em->getRepository('SiseCoreBundle:EffectiveeleveNouveauseptiemeannee')->findOneBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece, 'codeetabsour'=>$parameters['codeetabsour'], 'codetypeetabsour'=>$parameters['codetypeetabsour']));
                if($item){
                    $item->setNombelevmasc($parameters['nombelevmasc']);
                    $item->setNombelevfemi($parameters['nombelevfemi']);
                    $item->setNombtotaelev($parameters['nombelevfemi']+$parameters['nombelevmasc']);
                    $em->persist($item);
                    $em->flush();
                }else{
                    $etab = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codeetab' => $parameters['codeetabsour'], 'codetypeetab' => $parameters['codetypeetabsour']));
                    $typeetab = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findOneBy(array('codetypeetab' => $parameters['codetypeetabsour']));
                    $item = new EffectiveeleveNouveauseptiemeannee($codeetab, $codetypeetab, $annescol, $coderece, $parameters['codeetabsour'], $parameters['codetypeetabsour']);
                    $item->setNombelevmasc($parameters['nombelevmasc']);
                    $item->setNombelevfemi($parameters['nombelevfemi']);
                    $item->setNombtotaelev($parameters['nombelevfemi']+$parameters['nombelevmasc']);
                    $item->setEntityetabsour($etab);
                    $item->setEntitytypeetabsour($typeetab);
                    $em->persist($item);
                    $em->flush();
                }


            }
            return $this->redirect($this->generateUrl('effectiveelevenouveauseptiemeannee_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_nouveauseptiemeannee');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_nouveauseptiemeannee.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Displays a form to edit an existing EffectiveeleveNouveauseptiemeannee entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveelevenouveauseptiemeannee_list');
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNouveauseptiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_nouveauseptiemeannee');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_nouveauseptiemeannee.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }




    public function relatedListsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            if ($request->get('_circonscriptionregional') != '') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureCirconscriptionregional')->find($request->get('_circonscriptionregional'))->getCodedele();
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
                } elseif ($request->get('_delegation') != '') {
                    $nomenclatureetablissements = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->find($request->get('_delegation'))->getCodeetab();
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureetablissements as $nomenclatureetablissement) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureetablissement->getCodeetab();
                        $json[$i]['libelle'] = $nomenclatureetablissement->getCodeetab() . ' | ' . $nomenclatureetablissement->getLibeetabar();
                        $i++;
                    }
                }
            elseif ($request->get('_codeetabsour') != '') {
                $typeetab = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneByCodeetab($request->get('_codeetabsour'))->getCodetypeetab();
                $json = array();
                $json['code'] = $typeetab->getCodetypeetab();
                $json['libelle'] = $typeetab->getLibetypeetabar();
            }
                $response = new Response();
                $data = json_encode($json); // c'est pour formater la réponse de la requete en format que jquery va comprendre
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }
        return new Response('Erreur');
    }

}