<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 10/12/2014
 * Time: 16:02
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\BudgetSuivibudget;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * BudgetSuivibudget controller.
 *
 */
class BudgetSuivibudgetController extends Controller
{
    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
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
        $url = $this->generateUrl('budgetsuivibudget_edit');
        $pathUpdate = $this->generateUrl('budgetsuivibudget_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:BudgetSuivibudget')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('budget_suivibudget');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.budget_suivibudget.html.twig', array(
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
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('budgetsuivibudget_edit');
        $pathUpdate = $this->generateUrl('budgetsuivibudget_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:BudgetSuivibudget')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:BudgetSuivibudget')->findOneBy($items);


                $credouve = $request->request->get('credouve' . $i);
                $corrcred = $request->request->get('corrcred' . $i);
                $totaenga = $request->request->get('totaenga' . $i);


                $restenga = $request->request->get('restenga' . $i);
                $totapaye = $request->request->get('totapaye' . $i);
                $restpaye = $request->request->get('restpaye' . $i);


                $pourenga = $request->request->get('pourenga' . $i);
                $pourpaye = $request->request->get('pourpaye' . $i);

                $item->setCredouve($credouve);
                $item->setCorrcred($corrcred);
                $item->setTotaenga($totaenga);

                $item->setRestenga($restenga);
                $item->setTotapaye($totapaye);
                $item->setRestpaye($restpaye);


                $item->setPourenga($pourenga);
                $item->setPourpaye($pourpaye);

                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('budgetsuivibudget_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('budget_suivibudget');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.budget_suivibudget.html.twig', array(
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
        $url = $this->generateUrl('budgetsuivibudget_list');

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
            $entities = $em->getRepository('SiseCoreBundle:BudgetSuivibudget')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('budget_suivibudget');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.budget_suivibudget.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 