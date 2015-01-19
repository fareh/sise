<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 15/12/2014
 * Time: 12:47
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveFilierematiere;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectifeleveFilierematiere controller.
 *
 */
class EffectifeleveFilierematiereController extends Controller
{


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevefilierematiere_edit');
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
            $pathUpdate = $this->generateUrl('effectifelevefilierematiere_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $listeNivSco = array();
            if(count($entities)>0) {
                foreach ($entities as $entity) {
                    foreach ($entity->getCodematiopti()->getCodenivescol() as $niv) {
                        $listeNivSco[$niv->getCodenivescol()] = $niv->getLibenivescolar();
                    }
                }
            }
            if ($request->isMethod('GET')) {
                $niveauscolaires = $request->query->get('form');
                $nivv = $niveauscolaires['niveauscolaires'];
                $listeFils = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->getFilierematiere(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece), $nivv);
                $listMats = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->getListMatiopti(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece), $nivv);
                $listFlis = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->getListFli(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece), $nivv);

            }
            $form = $this->createFormBuilder()
                ->add('niveauscolaires', 'choice', array(
                    'choices' => $listeNivSco,
                    'required' => false,
                    'data' => (@$nivv) ? @$nivv : ""
                ))
                ->add('submit', 'submit')
                ->getForm();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_filierematiere');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_filierematiere.html.twig', array(
            'entities' => @$listeFils,
            'listMats' => @$listMats,
            'listFlis' => @$listFlis,
            'form' => @$form->createView(),
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectifelevefilierematiere_edit');
        $pathUpdate = $this->generateUrl('effectifelevefilierematiere_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            foreach ($entities as $item) {
                $nombelev = $request->request->get('nombelev' . $item->getCodefili()->getCodefili() . $item->getCodematiopti()->getCodematiopti());
                $item->setNombelev($nombelev);
                $em->persist($item);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('effectifelevefilierematiere_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_filierematiere');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_filierematiere.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevefilierematiere_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $listeNivSco = array();
            if(count($entities)>0){
                foreach ($entities as $entity) {
                    foreach ($entity->getCodematiopti()->getCodenivescol() as $niv) {
                        $listeNivSco[$niv->getCodenivescol()] = $niv->getLibenivescolar();
                    }
                }
            }

            if ($request->isMethod('GET')) {
                $niveauscolaires = $request->query->get('form');
                $nivv = $niveauscolaires['niveauscolaires'];
                $listeFils = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->getFilierematiere(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece), $nivv);
                $listMats = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->getListMatiopti(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece), $nivv);
                $listFlis = $em->getRepository('SiseCoreBundle:EffectifeleveFilierematiere')->getListFli(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece), $nivv);

            }

            $form = $this->createFormBuilder()
                ->add('niveauscolaires', 'choice', array(
                    'choices' => $listeNivSco,
                    'required' => false,
                    'data' => (@$nivv) ? @$nivv : ""
                ))
                ->add('submit', 'submit')
                ->getForm();


        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_filierematiere');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_filierematiere.html.twig', array(
            'entities' => @$listeFils,
            'listMats' => @$listMats,
            'listFlis' => @$listFlis,
            'form' => @$form->createView(),
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

}