<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 15/12/2014
 * Time: 11:06
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveElevenouveauclasspreparatoire;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectiveeleveElevenouveauclasspreparatoire controller.
 *
 */
class EffectiveeleveElevenouveauclasspreparatoireController extends Controller
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
        $url = $this->generateUrl('effectiveeleveelevenouveauclasspreparatoire_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveelevenouveauclasspreparatoire_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveElevenouveauclasspreparatoire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_elevenouveauclasspreparatoire');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_elevenouveauclasspreparatoire.html.twig', array(
            'entities' => @$entities,
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
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectiveeleveelevenouveauclasspreparatoire_edit');
        $pathUpdate = $this->generateUrl('effectiveeleveelevenouveauclasspreparatoire_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveElevenouveauclasspreparatoire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));

        if ($codeetab && $codetypeetab) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectiveeleveElevenouveauclasspreparatoire')->findOneBy($items);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('effectiveeleveelevenouveauclasspreparatoire_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_elevenouveauclasspreparatoire');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_elevenouveauclasspreparatoire.html.twig', array(
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
        $url = $this->generateUrl('effectiveeleveelevenouveauclasspreparatoire_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveElevenouveauclasspreparatoire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_elevenouveauclasspreparatoire');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_elevenouveauclasspreparatoire.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 