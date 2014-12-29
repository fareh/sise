<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationFilieresportversgeneraledeuxieme;
use Sise\Bundle\CoreBundle\Form\OrientationFilieresportversgeneraledeuxiemeType;

/**
 * OrientationFilieresportversgeneraledeuxieme controller.
 *
 */
class OrientationFilieresportversgeneraledeuxiemeController extends Controller
{

    /**
     * Lists all OrientationFilieresportversgeneraledeuxieme entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraledeuxieme_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codenivec Or P.codenivescol=:codenive2s
             ORDER BY F.ordraffi DESC')->setParameter('codenivec', 'C')
                ->setParameter('codenive2s', '2S');
            $entitiesfili = $query->execute();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresportversgeneraledeuxieme');
        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:index.html.twig', array(
            'entities' => @$entities,
            'nameclass' => @$nameclass,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
        ));
    }

    /**
     * Displays a form to edit an existing OrientationFilieresportversgeneraledeuxieme entity.
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
        $url = $this->generateUrl('orientationfilieresportversgeneraledeuxieme_edit');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codenivec Or P.codenivescol=:codenive2s
             ORDER BY F.ordraffi DESC')->setParameter('codenivec', 'C')
                ->setParameter('codenive2s', '2S');
            $entitiesfili = $query->execute();
            $pathUpdate = $this->generateUrl('orientationfilieresportversgeneraledeuxieme_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresportversgeneraledeuxieme');
        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:edit.html.twig', array(
            'entities' => @$entities,
            'nameclass' => @$nameclass,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'entitiesfili' => @$entitiesfili,
        ));
    }

    /**
     * Edits an existing OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraledeuxieme_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->findOneBy($items);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('orientationfilieresportversgeneraledeuxieme_edit'));

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresportversgeneraledeuxieme');

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'nameclass' => @$nameclass,
            'pathfilter' => $url,
        ));
    }
}
