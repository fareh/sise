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
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifeleveelevedomainsousdomain_edit');
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
        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_elevedomainsousdomain');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_elevedomainsousdomain.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
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
        $url = $this->generateUrl('effectifeleveelevedomainsousdomain_edit');
        $pathUpdate = $this->generateUrl('effectifeleveelevedomainsousdomain_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("_", $request->request->get('key_' . $i)), explode("_", $request->request->get('val_' . $i)));

                $item = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->findOneBy($items);

                if (!$item) {
                    throw $this->createNotFoundException('Unable to find SiseCoreBundle entity.');
                }
                $subdomains = $item->getCodedoma()->getCodesousdoma();
                $item->setNombclass($request->request->get('nombclass' . $i));
                $item->setNombelevmasc($request->request->get('nombelevmasc' . $i));
                $item->setNombelevfemi($request->request->get('nombelevfemi' . $i));
                $item->setNombtotaelev($request->request->get('nombtotaelev' . $i));
                $em->persist($item);
                foreach ($subdomains as $subdomain) {
                    $subdomain->setOrdraffi($request->request->get('codesousdoma_ordraffi_' . $subdomain->getCodesousdoma() . '_' . $i));
                    $em->persist($subdomain);
                }

                $em->flush();
            }
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
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifeleveelevedomainsousdomain_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveElevedomainsousdomain')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_elevedomainsousdomain');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_elevedomainsousdomain.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 