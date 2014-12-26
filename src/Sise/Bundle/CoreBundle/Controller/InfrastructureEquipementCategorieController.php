<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 18:00
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\InfrastructureEquipementCategorie;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * InfrastructureEquipementCategorie controller.
 *
 */
class InfrastructureEquipementCategorieController extends Controller
{
    /**
     * Displays a form to edit an existing InfrastructureEquipementCategorie entity.
     *
     */
    public function editAction(Request $request)
    {
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
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
        $url = $this->generateUrl('infrastructureequipementcategorie_edit');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->getInfrastructureEquipement($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodeequi()->getCodecateequi()->getCodecateequi()][$key] = $entity->getCodeequi()->getCodecateequi()->getCodecateequi();
            }
            $pathUpdate = $this->generateUrl('infrastructureequipementcategorie_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_equipement_categorie');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_equipement_categorie.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate,
        ));
    }


    /**
     * Edits an existing InfrastructureEquipementCategorie entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->getInfrastructureEquipement($codeetab, $codetypeetab, $annescol, $coderece);
        foreach ($entities as $key => $entity) {
            $rowspan[$entity->getCodeequi()->getCodecateequi()->getCodecateequi()][$key] = $entity->getCodeequi()->getCodecateequi()->getCodecateequi();
        }
        $url = $this->generateUrl('infrastructureequipementcategorie_edit');
        $pathUpdate = $this->generateUrl('infrastructureequipementcategorie_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->findOneBy($items);
                $nombespanonutil = $request->request->get('nombespanonutil' . $i);
                $nombespautil = $request->request->get('nombespautil' . $i);
                $obse = $request->request->get('obse' . $i);

                $item->setNombespanonutil($nombespanonutil);
                $item->setNombespautil($nombespautil);
                $item->setObse($obse);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('infrastructureequipementcategorie_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_equipement_categorie');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_equipement_categorie.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate,

        ));
    }


    /**
     * Displays a form to edit an existing InfrastructureEquipementCategorie entity.
     *
     */
    public function listAction(Request $request)
    {
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('infrastructureequipementcategorie_list');
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
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->getInfrastructureEquipement($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodeequi()->getCodecateequi()->getCodecateequi()][$key] = $entity->getCodeequi()->getCodecateequi()->getCodecateequi();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_equipement_categorie');
        return $this->render('SiseCoreBundle:Infrastructure:list.infrastructure_equipement_categorie.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


} 