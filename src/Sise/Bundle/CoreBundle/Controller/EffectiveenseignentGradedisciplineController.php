<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentGradediscipline;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentGradedisciplineType;

/**
 * EffectiveenseignentGradediscipline controller.
 *
 */
class EffectiveenseignentGradedisciplineController extends Controller
{

    /**
     * Lists all EffectiveenseignentGradediscipline entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentgradediscipline_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradediscipline')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_gradediscipline');
        return $this->render('SiseCoreBundle:EffectiveenseignentGradediscipline:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'nameclass' => $nameclass,
            'pathfilter' => $url,
        ));
    }

    /**
     * Displays a form to edit an existing EffectiveenseignentGradediscipline entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentgradediscipline_edit');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradediscipline')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $pathUpdate = $this->generateUrl('effectiveenseignentgradediscipline_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_gradediscipline');
        return $this->render('SiseCoreBundle:EffectiveenseignentGradediscipline:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Edits an existing EffectiveenseignentGradediscipline entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentgradediscipline_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradediscipline')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveenseignentGradediscipline')->findOneBy($items);
                $nombensetunimasc = $request->request->get('nombensetunimasc' . $i);
                $nombensetunifemi = $request->request->get('nombensetunifemi' . $i);
                $nombenseetramasc = $request->request->get('nombenseetramasc' . $i);
                $nombenseetrafemi = $request->request->get('nombenseetrafemi' . $i);
                $nombtotaense = $nombensetunimasc + $nombensetunifemi + $nombenseetramasc + $nombenseetrafemi;
                $item->setNombensetunimasc($nombensetunimasc);
                $item->setNombensetunifemi($nombensetunifemi);
                $item->setNombenseetramasc($nombenseetramasc);
                $item->setNombenseetrafemi($nombenseetrafemi);
                $item->setNombtotaense($nombtotaense);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectiveenseignentgradediscipline_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_gradediscipline');
        return $this->render('SiseCoreBundle:EffectiveenseignentGradediscipline:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'nameclass' => $nameclass,
            'pathfilter' => $url,
        ));
    }
}
