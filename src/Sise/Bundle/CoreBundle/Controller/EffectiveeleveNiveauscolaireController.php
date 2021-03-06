<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/12/2014
 * Time: 16:56
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * EffectiveeleveNiveauscolaire controller.
 *
 */
class EffectiveeleveNiveauscolaireController extends controller
{


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user = $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $controls = array('masc' =>10, 'femin' => 0);
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
        $url = $this->generateUrl('effectiveeleveniveauscolaire_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaire_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
           // $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
             $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaire')->getEffectiveeleveNiveauscolaire($codeetab, $codetypeetab,  $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodenivescol()->getCodenivescol()][$key] = $entity->getCodenivescol()->getCodenivescol();
            }
            if ($codetypeetab == 20) {
                $items = $em->getRepository('SiseCoreBundle:EffectiveeleveNouveauseptiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
                foreach ($items as $item) {

                    $controls['masc'] = $controls['masc'] + $item->getNombelevmasc();
                    $controls['femin'] = $controls['femin'] + $item->getNombelevfemi();
                }
            } elseif ($codetypeetab == 30) {
                $items = $em->getRepository('SiseCoreBundle:EffectifeleveNouveaupremierannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
                foreach ($items as $item) {
                    $controls['masc'] = $controls['masc'] + $item->getNombelevmasc();
                    $controls['femin'] = $controls['femin'] + $item->getNombelevfemi();
                }

            }

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_niveauscolaire');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'controls'=>$controls,
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
        $user = $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectiveeleveniveauscolaire_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaire_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaire')->findOneBy($items);

                $nombclasselev = $request->request->get('nombclasselev' . $i);
                $nombelevmascnouv = $request->request->get('nombelevmascnouv' . $i);
                $nombelevfeminouv = $request->request->get('nombelevfeminouv' . $i);


                $nombelevmascredo = $request->request->get('nombelevmascredo' . $i);
                $nombelevfemiredo = $request->request->get('nombelevfemiredo' . $i);


                $nombtotaelevmasc = $nombelevmascnouv + $nombelevmascredo;
                $nombtotaelevfemi = $nombelevfeminouv + $nombelevfemiredo;
                $nombtotaelev = $nombtotaelevmasc + $nombtotaelevfemi;

                $item->setNombclasselev($nombclasselev);
                $item->setNombelevmascnouv($nombelevmascnouv);
                $item->setNombelevfeminouv($nombelevfeminouv);
                $item->setNombelevmascredo($nombelevmascredo);
                $item->setNombelevfemiredo($nombelevfemiredo);
                $item->setNombtotaelevmasc($nombtotaelevmasc);
                $item->setNombtotaelevfemi($nombtotaelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectiveeleveniveauscolaire_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_niveauscolaire');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire.html.twig', array(
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
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveeleveniveauscolaire_list');
        $session = $request->getSession();
        $user = $this->get('security.context')->getToken()->getUser();
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
           // $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaire')->getEffectiveeleveNiveauscolaire($codeetab, $codetypeetab,  $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodenivescol()->getCodenivescol()][$key] = $entity->getCodenivescol()->getCodenivescol();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_niveauscolaire');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_niveauscolaire.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


} 