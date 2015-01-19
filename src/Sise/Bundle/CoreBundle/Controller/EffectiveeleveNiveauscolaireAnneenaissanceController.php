<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 10/12/2014
 * Time: 16:05
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectiveeleveNiveauscolaireAnneenaissance controller.
 *
 */
class EffectiveeleveNiveauscolaireAnneenaissanceController extends Controller
{


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
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
        $url = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance')->getNiveauscolaireAnneenaissance(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $annenais = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance')->getListAnnenais(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_niveauscolaire_anneenaissance');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
            'entities' => @$entities,
            'annenais' => @$annenais,
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
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $url = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_edit');
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance')->getNiveauscolaireAnneenaissance(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        $annenais = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance')->getListAnnenais(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            foreach ($entities as $item) {
                $nombelevmasc = $request->request->get('nombelevmasc' . $item->getCodenivescol()->getCodenivescol() . $item->getCodeannenais()->getCodeannenais());
                $nombelevfemi = $request->request->get('nombelevfemi' . $item->getCodenivescol()->getCodenivescol() . $item->getCodeannenais()->getCodeannenais());
                $nombtota = $nombelevfemi + $nombelevmasc;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtota);
                $em->persist($item);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('effectiveeleveniveauscolaireanneenaissance_edit'));
        }

        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_niveauscolaire_anneenaissance');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
            'entities' => @$entities,
            'annenais' => @$annenais,
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
        $url = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_list');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance')->getNiveauscolaireAnneenaissance(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $annenais = $em->getRepository('SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance')->getListAnnenais(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_niveauscolaire_anneenaissance');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
            'entities' => @$entities,
            'annenais' => @$annenais,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass

        ));
    }
} 