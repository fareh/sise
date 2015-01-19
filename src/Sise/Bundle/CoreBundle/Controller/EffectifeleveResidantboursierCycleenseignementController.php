<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 15/12/2014
 * Time: 09:14
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * EffectifeleveResidantboursierCycleenseignement controller.
 *
 */
class EffectifeleveResidantboursierCycleenseignementController extends Controller
{


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user = $this->get('security.context')->getToken()->getUser();
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
        $url = $this->generateUrl('effectifeleveresidantboursiercycleenseignement_edit');
        $pathUpdate = $this->generateUrl('effectifeleveresidantboursiercycleenseignement_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveResidantboursierCycleenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_residantboursier_cycleenseignement');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_residantboursier_cycleenseignement.html.twig', array(
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
        $user = $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectifeleveresidantboursiercycleenseignement_edit');
        $pathUpdate = $this->generateUrl('effectifeleveresidantboursiercycleenseignement_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveResidantboursierCycleenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectifeleveResidantboursierCycleenseignement')->findOneBy($items);
                $nombelevresimasc = $request->request->get('nombelevresimasc' . $i);
                $nombelevresifemi = $request->request->get('nombelevresifemi' . $i);
                $nombtotaresielev = $nombelevresimasc + $nombelevresifemi;

                $nombelevbourmasc = $request->request->get('nombelevbourmasc' . $i);
                $nombelevbourfemi = $request->request->get('nombelevbourfemi' . $i);
                $nombtotabourelev = $nombelevbourmasc + $nombelevbourfemi;

                $nombbour = $request->request->get('nombbour' . $i);
                $item->setNombelevresimasc($nombelevresimasc);
                $item->setNombelevresifemi($nombelevresifemi);
                $item->setNombtotaresielev($nombtotaresielev);


                $item->setNombelevbourmasc($nombelevbourmasc);
                $item->setNombelevbourfemi($nombelevbourfemi);
                $item->setNombtotabourelev($nombtotabourelev);
                $item->setNombbour($nombbour);
                $em->persist($item);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('effectifeleveresidantboursiercycleenseignement_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_residantboursier_cycleenseignement');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_residantboursier_cycleenseignement.html.twig', array(
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
        $url = $this->generateUrl('effectifeleveresidantboursiercycleenseignement_list');
        $session = $request->getSession();
        $user = $this->get('security.context')->getToken()->getUser();
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
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveResidantboursierCycleenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_residantboursier_cycleenseignement');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_residantboursier_cycleenseignement.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


}