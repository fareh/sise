<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 17/12/2014
 * Time: 09:30
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\InfrastructureLogement;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Form\InfrastructureLogementType;

/**
 * InfrastructureLogement controller.
 *
 */
class InfrastructureLogementController extends Controller
{

    /**
     * Displays a form to edit an existing InfrastructureLogement entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('infrastructurelogement_edit');
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
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureLogement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            foreach ($entities as $key => $item) {
                $editForms[$key] = $this->createEditForm($item, $key)->createView();
            }
            $pathUpdate = $this->generateUrl('infrastructurelogement_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_logement');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_logement.html.twig', array(
            'entities' => @$entities,
            'editForms' => $editForms,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    private function createEditForm(InfrastructureLogement $entity, $key)
    {
        $form = $this->createForm(new InfrastructureLogementType($key), $entity);
        return $form;
    }


    /**
     * Edits an existing InfrastructureLogement entity.
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
        $url = $this->generateUrl('infrastructurelogement_edit');
        $pathUpdate = $this->generateUrl('infrastructurelogement_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:InfrastructureLogement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            foreach ($request->request as $parameters) {
                echo (string)$parameters['maCle'];
                $items = array_combine(explode("|", 'codeetab|codetypeetab|annescol|coderece|numeloge'), explode("|", $parameters['maCle']));
                $item = $em->getRepository('SiseCoreBundle:InfrastructureLogement')->findOneBy($items);
                $codetypeloge = $parameters['codetypeloge'];
                $surfcouv = $parameters['surfcouv'];
                $codepropbati = $parameters['codepropbati'];
                $obse = $parameters['obse'];
                $nomprenhabi = $parameters['nomprenhabi'];
                $codestathabi = $parameters['codestathabi'];
                $codesitucompeau = $parameters['codesitucompeau'];
                $codesitucompelec = $parameters['codesitucompelec'];
                $item->setCodetypeloge($em->getRepository('SiseCoreBundle:NomenclatureTypelogement')->find($codetypeloge));
                $item->setSurfcouv($surfcouv);
                $item->setCodepropbati($em->getRepository('SiseCoreBundle:NomenclatureProprietebatiment')->find($codepropbati));
                $item->setObse($obse);
                $item->setNomprenhabi($nomprenhabi);
                $item->setCodestathabi($em->getRepository('SiseCoreBundle:NomenclatureStatushabitant')->find($codestathabi));
                $item->setCodesitucompeau($em->getRepository('SiseCoreBundle:NomenclatureSituationcompteureauelectricite')->find($codesitucompeau));
                $item->setCodesitucompelec($em->getRepository('SiseCoreBundle:NomenclatureSituationcompteureauelectricite')->find($codesitucompelec));
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('infrastructurelogement_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_logement');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_logement.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Displays a form to edit an existing InfrastructureLogement entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('infrastructurelogement_list');
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
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureLogement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_logement');
        return $this->render('SiseCoreBundle:Infrastructure:list.infrastructure_logement.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


}