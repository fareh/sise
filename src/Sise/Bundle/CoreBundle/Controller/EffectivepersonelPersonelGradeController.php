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
use Sise\Bundle\CoreBundle\Entity\EffectivepersonelPersonelGrade;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectivepersonelPersonelGrade controller.
 *
 */
class EffectivepersonelPersonelGradeController extends Controller
{

    /**
     * Displays a form to edit an existing EffectivepersonelPersonelGrade entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectivepersonelpersonelgrade_edit');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectivepersonelPersonelGrade')->getEffectivepersonel($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodegrad()->getCodecorp()->getCodecorp()][$key] = $entity->getCodegrad()->getCodecorp()->getCodecorp();
            }
            $pathUpdate = $this->generateUrl('effectivepersonelpersonelgrade_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectivepersonel_personel_grade');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectivepersonel_personel_grade.html.twig', array(

            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Edits an existing EffectivepersonelPersonelGrade entity.
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
        $url = $this->generateUrl('effectivepersonelpersonelgrade_edit');
        $pathUpdate = $this->generateUrl('effectivepersonelpersonelgrade_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectivepersonelPersonelGrade')->getEffectivepersonel($codeetab, $codetypeetab, $annescol, $coderece);
        foreach ($entities as $key => $entity) {
            $rowspan[$entity->getCodegrad()->getCodecorp()->getCodecorp()][$key] = $entity->getCodegrad()->getCodecorp()->getCodecorp();
        }
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectivepersonelPersonelGrade')->findOneBy($items);
                $nombpersmasc = $request->request->get('nombpersmasc' . $i);
                $nombpersfemi = $request->request->get('nombpersfemi' . $i);
                $nombtotapers = $nombpersmasc + $nombpersfemi;
                $item->setNombpersmasc($nombpersmasc);
                $item->setNombpersfemi($nombpersfemi);
                $item->setNombtotapers($nombtotapers);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectivepersonelpersonelgrade_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectivepersonel_personel_grade');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectivepersonel_personel_grade.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Displays a form to edit an existing EffectivepersonelPersonelGrade entity.
     *
     */
    public function listAction(Request $request)
    {
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectivepersonelpersonelgrade_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectivepersonelPersonelGrade')->getEffectivepersonel($codeetab, $codetypeetab, $annescol, $coderece);
            foreach ($entities as $key => $entity) {
                $rowspan[$entity->getCodegrad()->getCodecorp()->getCodecorp()][$key] = $entity->getCodegrad()->getCodecorp()->getCodecorp();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectivepersonel_personel_grade');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectivepersonel_personel_grade.html.twig', array(
            'entities' => @$entities,
            'rowspan' => @$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


}