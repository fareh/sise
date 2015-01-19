<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 10/12/2014
 * Time: 16:03
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveElevedomainsousdomain;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectifeleveElevedomainsousdomain controller.
 *
 */
class EffectifeleveElevedomainsousdomainController extends Controller
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
        $url = $this->generateUrl('effectifeleveelevedomainsousdomain_edit');
        $pathUpdate = $this->generateUrl('effectifeleveelevedomainsousdomain_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->getElevedomainsousdomain(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            foreach ($entities as $key => $entity) {

                $rowspan[$entity->getCodesousdoma()->getCodedoma()->getCodedoma()][$key] = $entity->getCodesousdoma()->getCodedoma()->getCodedoma();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_elevedomainsousdomain');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_elevedomainsousdomain.html.twig', array(
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
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifeleveelevedomainsousdomain_edit');
        $pathUpdate = $this->generateUrl('effectifeleveelevedomainsousdomain_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $entities = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->getElevedomainsousdomain(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->findOneBy($items);
                if (!$item) {
                    throw $this->createNotFoundException('Unable to find SiseCoreBundle entity.');
                }
                $nombclass = $request->request->get('nombclass' . $i);
                $nombgrou = $request->request->get('nombgrou' . $i);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombclass($nombclass);
                $item->setNombgrou($nombgrou);
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectifeleveelevedomainsousdomain_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_elevedomainsousdomain');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_elevedomainsousdomain.html.twig', array(
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
        $url = $this->generateUrl('effectifeleveelevedomainsousdomain_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->getElevedomainsousdomain(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            foreach ($entities as $key => $entity) {

                $rowspan[$entity->getCodesousdoma()->getCodedoma()->getCodedoma()][$key] = $entity->getCodesousdoma()->getCodedoma()->getCodedoma();
            }

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_elevedomainsousdomain');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_elevedomainsousdomain.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass

        ));
    }

} 