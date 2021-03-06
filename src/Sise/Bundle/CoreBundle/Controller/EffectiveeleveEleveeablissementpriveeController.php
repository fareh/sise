<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/12/2014
 * Time: 09:07
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveEleveeablissementprivee;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectiveeleveEleveeablissementprivee controller.
 *
 */
class EffectiveeleveEleveeablissementpriveeController extends Controller
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
        $url = $this->generateUrl('effectiveeleveeleveeablissementprivee_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveeleveeablissementprivee_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveEleveeablissementprivee')->getEleveeablissementprivee($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodenivescol()->getCodecyclense()->getCodecyclense()][$key] = $entity->getCodenivescol()->getCodecyclense()->getCodecyclense();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_eleveeablissementprivee');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_eleveeablissementprivee.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate,
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectiveeleveeleveeablissementprivee_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveeleveeablissementprivee_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveEleveeablissementprivee')->getEleveeablissementprivee($codeetab, $codetypeetab, $annescol, $coderece);
        foreach ($entities as $key => $entity) {
            $rowspan[$entity->getCodenivescol()->getCodecyclense()->getCodecyclense()][$key] = $entity->getCodenivescol()->getCodecyclense()->getCodecyclense();
        }
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveeleveEleveeablissementprivee')->findOneBy($items);
                $nombelevmascnouv = $request->request->get('nombelevmascnouv' . $i);
                $nombelevfeminouv = $request->request->get('nombelevfeminouv' . $i);
                $nombelevmascredo = $request->request->get('nombelevmascredo' . $i);
                $nombelevfemiredo = $request->request->get('nombelevfemiredo' . $i);
                $nombtotaelevmasc = $nombelevmascnouv + $nombelevmascredo;
                $nombtotaelevfemi = $nombelevfeminouv + $nombelevfemiredo;
                $nombtotaelev = $nombtotaelevfemi + $nombtotaelevmasc;
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
            return $this->redirect($this->generateUrl('effectiveeleveeleveeablissementprivee_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_eleveeablissementprivee');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_eleveeablissementprivee.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate
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
        $url = $this->generateUrl('effectiveeleveeleveeablissementprivee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveEleveeablissementprivee')->getEleveeablissementprivee($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {

                $rowspan[$entity->getCodenivescol()->getCodecyclense()->getCodecyclense()][$key] = $entity->getCodenivescol()->getCodecyclense()->getCodecyclense();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_eleveeablissementprivee');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_eleveeablissementprivee.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 