<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/12/2014
 * Time: 10:36
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveFilstravailleuretrangerCycleenseignement;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectifeleveFilstravailleuretrangerCycleenseignement controller.
 *
 */

class EffectifeleveFilstravailleuretrangerCycleenseignementController extends controller {


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("features", $params);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $url = $this->generateUrl('effectifelevefilstravailleuretrangercycleenseignement_edit');
        $pathUpdate = $this->generateUrl('effectifelevefilstravailleuretrangercycleenseignement_update', array( 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveFilstravailleuretrangerCycleenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_filstravailleuretranger_cycleenseignement');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_filstravailleuretranger_cycleenseignement.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass'=>$nameclass
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectifelevefilstravailleuretrangercycleenseignement_edit');
        $pathUpdate = $this->generateUrl('effectifelevefilstravailleuretrangercycleenseignement_update', array( 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveFilstravailleuretrangerCycleenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));

                var_dump($items); die;
                $item = $em->getRepository('SiseCoreBundle:EffectifeleveFilstravailleuretrangerCycleenseignement')->findOneBy($items);
                $item->setNombelevresimasc($request->request->get('sise_bundle_corebundle_effectifelevefilstravailleuretrangercycleenseignement_nombelevresimasc_' . $i));
                $item->setNombelevresifemi($request->request->get('sise_bundle_corebundle_effectifelevefilstravailleuretrangercycleenseignement_nombelevresifemi_' . $i));
                $item->setNombtotaresielev($request->request->get('sise_bundle_corebundle_effectifelevefilstravailleuretrangercycleenseignement_nombtotaresielev_' . $i));
                $item->setNombelevbourfemi($request->request->get('sise_bundle_corebundle_effectifelevefilstravailleuretrangercycleenseignement_nombelevbourfemi_' . $i));
                $item->setNombtotabourelev($request->request->get('sise_bundle_corebundle_effectifelevefilstravailleuretrangercycleenseignement_nombtotabourelev_' . $i));
                $em->persist($item);

                $em->flush();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_filstravailleuretranger_cycleenseignement');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_filstravailleuretranger_cycleenseignement.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass'=>$nameclass
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevefilstravailleuretrangercycleenseignement_list');
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveFilstravailleuretrangerCycleenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }


        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_filstravailleuretranger_cycleenseignement');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_filstravailleuretranger_cycleenseignement.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass'=>$nameclass
        ));
    }


} 