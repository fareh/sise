<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationEleveredoublanttroisiemeannee;
use Sise\Bundle\CoreBundle\Form\OrientationEleveredoublanttroisiemeanneeType;

/**
 * OrientationEleveredoublanttroisiemeannee controller.
 *
 */
class OrientationEleveredoublanttroisiemeanneeController extends Controller
{

    /**
     * Lists all OrientationEleveredoublanttroisiemeannee entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationeleveredoublanttroisiemeannee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S');
            $entitiesfili = $query->execute();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_eleveredoublanttroisiemeannee');
        return $this->render('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing OrientationEleveredoublanttroisiemeannee entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationeleveredoublanttroisiemeannee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S');
            $entitiesfili = $query->execute();
            $pathUpdate = $this->generateUrl('orientationeleveredoublanttroisiemeannee_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_eleveredoublanttroisiemeannee');

        return $this->render('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Edits an existing OrientationEleveredoublanttroisiemeannee entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationeleveredoublanttroisiemeannee_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee')->findBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee')->findOneBy($items);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('orientationeleveredoublanttroisiemeannee_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_eleveredoublanttroisiemeannee');
        return $this->render('SiseCoreBundle:OrientationEleveredoublanttroisiemeannee:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }
}
