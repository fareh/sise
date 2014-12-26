<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 15:30
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\InfrastructureTypecategorieespace;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * InfrastructureTypecategorieespace controller.
 *
 */
class InfrastructureTypecategorieespaceController extends Controller
{
    /**
     * Displays a form to edit an existing InfrastructureTypecategorieespace entity.
     *
     */
    public function editAction(Request $request)
    {
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
        $url = $this->generateUrl('infrastructuretypecategorieespace_edit');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureTypecategorieespace')->getInfrastructureTypes($codeetab, $codetypeetab, $annescol, $coderece);
            $pathUpdate = $this->generateUrl('infrastructuretypecategorieespace_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_typecategorieespace');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_typecategorieespace.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate,
        ));
    }


    /**
     * Edits an existing InfrastructureTypecategorieespace entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('infrastructuretypecategorieespace_edit');
        $pathUpdate = $this->generateUrl('infrastructuretypecategorieespace_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:InfrastructureTypecategorieespace')->getInfrastructureTypes($codeetab, $codetypeetab, $annescol, $coderece);
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:InfrastructureTypecategorieespace')->findOneBy($items);


                $nombespautil = $request->request->get('nombespautil' . $i);
                $capaaccuespautil = $request->request->get('capaaccuespautil' . $i);
                $nombespanonutil = $request->request->get('nombespanonutil' . $i);
                $capaaccuespanonutil = $request->request->get('capaaccuespanonutil' . $i);
                $nombespaencoamen = $request->request->get('nombespaencoamen' . $i);
                $capaaccuespaencoamen = $request->request->get('capaaccuespaencoamen' . $i);
                $nombespaencocons = $request->request->get('nombespaencocons' . $i);
                $capaaccuespaencocons = $request->request->get('capaaccuespaencocons' . $i);
                $obse = $request->request->get('obse' . $i);

                $item->setNombespautil($nombespautil);
                $item->setCapaaccuespautil($capaaccuespautil);
                $item->setNombespanonutil($nombespanonutil);
                $item->setCapaaccuespanonutil($capaaccuespanonutil);
                $item->setNombespaencoamen($nombespaencoamen);
                $item->setCapaaccuespaencoamen($capaaccuespaencoamen);
                $item->setNombespaencocons($nombespaencocons);
                $item->setCapaaccuespaencocons($capaaccuespaencocons);
                $item->setObse($obse);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('infrastructuretypecategorieespace_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_typecategorieespace');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_typecategorieespace.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Displays a form to edit an existing InfrastructureTypecategorieespace entity.
     *
     */
    public function listAction(Request $request)
    {
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
        $url = $this->generateUrl('infrastructuretypecategorieespace_list');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureTypecategorieespace')->getInfrastructureTypes($codeetab, $codetypeetab, $annescol, $coderece);
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_typecategorieespace');
        return $this->render('SiseCoreBundle:Infrastructure:list.infrastructure_typecategorieespace.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


} 