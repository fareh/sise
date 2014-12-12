<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/12/2014
 * Time: 09:52
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectiveeleveRepartioneleveLieuhabitation controller.
 *
 */
class EffectiveeleveRepartioneleveLieuhabitationController extends Controller
{

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
        $url = $this->generateUrl('effectiveeleverepartionelevelieuhabitatione_edit');
        $pathUpdate = $this->generateUrl('effectiveeleverepartionelevelieuhabitatione_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_repartioneleve_lieuhabitation');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_repartioneleve_lieuhabitation.html.twig', array(
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
        $url = $this->generateUrl('effectiveeleverepartionelevelieuhabitatione_edit');
        $pathUpdate = $this->generateUrl('effectiveeleverepartionelevelieuhabitatione_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("_", $request->request->get('key_' . $i)), explode("_", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findOneBy($items);
                $item->setNombelevresimasc($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombelevresimasc_' . $i));
                $item->setNombelevresifemi($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombelevresifemi_' . $i));
                $item->setNombtotaresielev($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombtotaresielev_' . $i));
                $item->setNombelevbourfemi($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombelevbourfemi_' . $i));
                $item->setNombtotabourelev($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombtotabourelev_' . $i));
                $em->persist($item);

                $em->flush();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_repartioneleve_lieuhabitation');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_repartioneleve_lieuhabitation.html.twig', array(
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
        $url = $this->generateUrl('effectiveeleverepartionelevelieuhabitation_list');
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
            //          $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('annescol' => $annescol, 'coderece' => $coderece, 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('annescol' => 2014, 'coderece' => 1111, 'codeetab' => 100115, 'codetypeetab' => 10));

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_repartioneleve_lieuhabitation');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_repartioneleve_lieuhabitation.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass'=>$nameclass
        ));
    }

} 