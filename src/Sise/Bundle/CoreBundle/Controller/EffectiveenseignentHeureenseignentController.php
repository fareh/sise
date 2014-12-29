<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentHeureenseignent;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentHeureenseignentType;

/**
 * EffectiveenseignentHeureenseignent controller.
 *
 */
class EffectiveenseignentHeureenseignentController extends Controller
{

    /**
     * Lists all EffectiveenseignentHeureenseignent entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentheureenseignent_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentHeureenseignent')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_heureenseignent');
        return $this->render('SiseCoreBundle:EffectiveenseignentHeureenseignent:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing EffectiveenseignentHeureenseignent entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentheureenseignent_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentHeureenseignent')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $pathUpdate = $this->generateUrl('effectiveenseignentheureenseignent_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_heureenseignent');
        return $this->render('SiseCoreBundle:EffectiveenseignentHeureenseignent:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Edits an existing EffectiveenseignentHeureenseignent entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentheureenseignent_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentHeureenseignent')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveenseignentHeureenseignent')->findOneBy($items);
                $totaheurense = $request->request->get('totaheurense' . $i);
                $totaheurensesupp = $request->request->get('totaheurensesupp' . $i);
                $totaheurensecomp = $request->request->get('totaheurensecomp' . $i);
                $item->setTotaheurense($totaheurense);
                $item->setTotaheurensesupp($totaheurensesupp);
                $item->setTotaheurensecomp($totaheurensecomp);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectiveenseignentheureenseignent_edit'));

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_heureenseignent');
        return $this->render('SiseCoreBundle:EffectiveenseignentHeureenseignent:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }
}
