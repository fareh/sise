<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationFilieresportversgeneraletroisieme;
use Sise\Bundle\CoreBundle\Form\OrientationFilieresportversgeneraletroisiemeType;

/**
 * OrientationFilieresportversgeneraletroisieme controller.
 *
 */
class OrientationFilieresportversgeneraletroisiemeController extends Controller
{

    /**
     * Lists all OrientationFilieresportversgeneraletroisieme entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraletroisieme_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s Or P.codenivescol=:codenive4s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S')
                ->setParameter('codenive4s', '4S');
            $entitiesfili = $query->execute();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresportversgeneraletroisieme');
        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'entitiesfili' => @$entitiesfili,
        ));
    }

    /**
     * Displays a form to edit an existing OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraletroisieme_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s Or P.codenivescol=:codenive4s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S')
                ->setParameter('codenive4s', '4S');
            $entitiesfili = $query->execute();
            $pathUpdate = $this->generateUrl('orientationfilieresportversgeneraletroisieme_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresportversgeneraletroisieme');
        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate,
            'entitiesfili' => @$entitiesfili,
        ));
    }

    /**
     * Edits an existing OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraletroisieme_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->findBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->findOneBy($items);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('orientationfilieresportversgeneraletroisieme_edit'));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'pathfilter' => $url,
        ));
    }
}
