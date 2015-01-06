<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 15/12/2014
 * Time: 12:13
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeenseignenteducationsportif;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentListeenseignenteducationsportifType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EffectiveenseignentListeenseignenteducationsportif controller.
 *
 */
class EffectiveenseignentListeenseignenteducationsportifController extends Controller
{

    /**
     * Displays a form to edit an existing EffectiveenseignentListeenseignenteducationsportif entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteenseignenteducationsportif_edit');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignenteducationsportif')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            if (count($entities) > 0) {
                foreach ($entities as $key => $item) {
                    $editForms[$item->getNumeense()] = $this->createEditForm($item, $item->getNumeense())->createView();
                }
            } else {
                $editForms[1] = $this->createEditForm(new EffectiveenseignentListeenseignenteducationsportif(), 1)->createView();
            }

            $pathUpdate = $this->generateUrl('effectiveenseignentlisteenseignenteducationsportif_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_listeenseignenteducationsportif');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveenseignent_listeenseignenteducationsportif.html.twig', array(
            'entities' => @$entities,
            'editForms' => @$editForms,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    private function createEditForm(EffectiveenseignentListeenseignenteducationsportif $entity, $key)
    {
        $form = $this->createForm(new EffectiveenseignentListeenseignenteducationsportifType($key), $entity);
        return $form;
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
            $numeense = "";
            $numeense = $request->get('numeense');
            if ($codeetab != '' and  $codetypeetab != '' and  $annescol != '' and  $coderece != '' and  $numeense != ''  ) {
                $item = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignenteducationsportif')->findOneBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece, 'numeense' => $numeense));
                if ($item) {
                    $em->remove($item);
                    $em->flush();
                }
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

    public  function itemAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $newcompteur = '';
            $newcompteur = $request->get('newcompteur');
            if ($newcompteur != '') {
                $form = $this->createEditForm(new EffectiveenseignentListeenseignenteducationsportif(), $newcompteur)->createView();
                return $this->render('SiseCoreBundle:Default:prototype_listeenseignenteducationsportif.html.twig', array(
                    'form' => @$form,
                ));


            }else{
                return new Response("Ereeur");
            }

        }

        return new Response("Ereeur");
    }


    /**
     * Edits an existing EffectiveenseignentListeenseignenteducationsportif entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectiveenseignentlisteenseignenteducationsportif_edit');
        $pathUpdate = $this->generateUrl('effectiveenseignentlisteenseignenteducationsportif_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignenteducationsportif')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            foreach ($request->request as $numeense => $parameters) {

                $item = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignenteducationsportif')->findOneBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece, 'numeense'=>$numeense));
                if($item){
                    $editForm =   $this->createEditForm($item, $item->getNumeense());
                    $editForm->handleRequest($request);
                    $em->persist($item);
                    $em->flush();
                }else{
                    $item = new EffectiveenseignentListeenseignenteducationsportif($codeetab, $codetypeetab, $annescol, $coderece,$numeense);
                    $editForm =   $this->createEditForm($item, $numeense);
                    $editForm->handleRequest($request);
                    $em->persist($item);
                    $em->flush();
                }


            }
            return $this->redirect($this->generateUrl('effectiveenseignentlisteenseignenteducationsportif_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_listeenseignenteducationsportif');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveenseignent_listeenseignenteducationsportif.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Displays a form to edit an existing EffectiveenseignentListeenseignenteducationsportif entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteenseignenteducationsportif_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignenteducationsportif')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_listeenseignenteducationsportif');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveenseignent_listeenseignenteducationsportif.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


}
