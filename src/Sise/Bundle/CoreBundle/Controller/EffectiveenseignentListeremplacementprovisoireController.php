<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeremplacementprovisoire;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentListeremplacementprovisoireType;

/**
 * EffectiveenseignentListeremplacementprovisoire controller.
 *
 */
class EffectiveenseignentListeremplacementprovisoireController extends Controller
{

    /**
     * Lists all EffectiveenseignentListeremplacementprovisoire entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_listeremplacementprovisoire');
        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'nameclass' => $nameclass,
            'pathfilter' => $url,
        ));
    }

    /**
     * Displays a form to edit an existing EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $pathUpdate = $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_listeremplacementprovisoire');
        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Edits an existing EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->findBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->findOneBy($items);
                $nomprenense = $request->request->get('nomprenense' . $i);
                $nombheur = $request->request->get('nombheur' . $i);
                $codecausrempprov = $request->request->get('codecausrempprov' . $i);
                $item->setNombelevmasc($nomprenense);
                $item->setNombelevfemi($nombheur);
                $item->setNombtotaelev($codecausrempprov);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectiveenseignentlisteremplacementprovisoire_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveenseignent_listeremplacementprovisoire');
        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'nameclass' => $nameclass,
            'pathfilter' => $url,
        ));
    }
}
