<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 10/12/2014
 * Time: 16:02
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EtablissementActivite;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EtablissementActivite controller.
 *
 */
class EtablissementActiviteController extends Controller
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
        $url = $this->generateUrl('etablissementactivite_edit');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EtablissementActivite')->getEtablissementActivite($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {

                $rowspan[$entity->getCodeacti()->getCodecateacti()->getCodecateacti()][$key] = $entity->getCodeacti()->getCodecateacti()->getCodecateacti();
            }

            $pathUpdate = $this->generateUrl('etablissementactivite_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('etablissement_activite');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.etablissement_activite.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
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
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('etablissementactivite_edit');
        $pathUpdate = $this->generateUrl('etablissementactivite_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EtablissementActivite')->getEtablissementActivite($codeetab, $codetypeetab, $annescol, $coderece);
        foreach ($entities as $key => $entity) {

            $rowspan[$entity->getCodeacti()->getCodecateacti()->getCodecateacti()][$key] = $entity->getCodeacti()->getCodecateacti()->getCodecateacti();
        }
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EtablissementActivite')->findOneBy($items);
                $nombacti = $request->request->get('nombacti' . $i);
                $obse = $request->request->get('obse' . $i);
                $item->setNombacti($nombacti);
                $item->setObse($obse);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('etablissementactivite_update'));
        }

        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('etablissement_activite');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.etablissement_activite.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
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
        $url = $this->generateUrl('etablissementactivite_list');
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
            //  $entities = $em->getRepository('SiseCoreBundle:EtablissementActivite')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol'=>$annescol, 'coderece'=>$coderece));
            $entities = $em->getRepository('SiseCoreBundle:EtablissementActivite')->getEtablissementActivite($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {

                $rowspan[$entity->getCodeacti()->getCodecateacti()->getCodecateacti()][$key] = $entity->getCodeacti()->getCodecateacti()->getCodecateacti();
            }


        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('etablissement_activite');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.etablissement_activite.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 