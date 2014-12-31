<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentGradeheuretravail;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentGradeheuretravailType;

/**
 * EffectiveenseignentGradeheuretravail controller.
 *
 */
class EffectiveenseignentGradeheuretravailController extends Controller
{

    /**
     * Lists all EffectiveenseignentGradeheuretravail entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentgradeheuretravail_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradeheuretravail')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT H
             FROM SiseCoreBundle:NomenclatureHeureenseignement H
             ORDER BY H.ordraffi ASC');
            $entitiesHeurensei = $query->execute();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_gradeheuretravail');
        return $this->render('SiseCoreBundle:EffectiveenseignentGradeheuretravail:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'entitiesHeurensei' => @$entitiesHeurensei,
        ));
    }

    /**
     * Displays a form to edit an existing EffectiveenseignentGradeheuretravail entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentgradeheuretravail_edit');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradeheuretravail')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT H
             FROM SiseCoreBundle:NomenclatureHeureenseignement H
             ORDER BY H.ordraffi ASC');
            $entitiesHeurensei = $query->execute();
            $pathUpdate = $this->generateUrl('effectiveenseignentgradeheuretravail_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_gradeheuretravail');
        return $this->render('SiseCoreBundle:EffectiveenseignentGradeheuretravail:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'entitiesHeurensei' => @$entitiesHeurensei,
            'pathUpdate' => @$pathUpdate,
        ));
    }

    /**
     * Edits an existing EffectiveenseignentGradeheuretravail entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentgradeheuretravail_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradeheuretravail')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradeheuretravail')->findOneBy($items);
                $nombensemasc = $request->request->get('nombensemasc' . $i);
                $nombensefemi = $request->request->get('nombensefemi' . $i);
                $nombtotaense = $nombensemasc + $nombensefemi;
                $item->setNombensemasc($nombensemasc);
                $item->setNombensefemi($nombensefemi);
                $item->setNombtotaense($nombtotaense);
                $em->persist($item);
                $em->flush();
            }
            $pathUpdate = $this->generateUrl('effectiveenseignentgradeheuretravail_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            return $this->redirect($this->generateUrl('effectiveenseignentgradeheuretravail_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_gradeheuretravail');
        return $this->render('SiseCoreBundle:EffectiveenseignentGradeheuretravail:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'nameclass' => $nameclass,
            'pathfilter' => $url,
        ));
    }
}
