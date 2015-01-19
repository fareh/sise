<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Sise\Bundle\CoreBundle\Form\MouvementeleveRecapmouvmenteleveType;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * MouvementeleveRecapmouvmenteleve controller.
 *
 */
class MouvementeleveRecapmouvmenteleveController extends Controller
{

    /**
     * Lists all MouvementeleveRecapmouvmenteleve entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('mouvementeleverecapmouvmenteleve_list');
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
            // $entities = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT M
             FROM SiseCoreBundle:MouvementeleveRecapmouvmenteleve M
             INNER JOIN SiseCoreBundle:NomenclatureNiveauscolaire P  WITH  M.codenivescol=P.codenivescol
             WHERE M.codeetab=:codeetab and M.codetypeetab=:codetypeetab and M.annescol=:annescol and M.coderece=:coderece
             ORDER BY P.ordraffi ASC, M.codefili ASC, M.codegenr DESC')->setParameter('codeetab', $codeetab)
                ->setParameter('codetypeetab', $codetypeetab)
                ->setParameter('annescol', $annescol)
                ->setParameter('coderece', $coderece);
            $entities = $query->execute();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('mouvementeleve_recapmouvmenteleve');
        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'nameclass' => @$nameclass,
            'pathfilter' => $url,
        ));
    }

    /**
     * Displays a form to edit an existing MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('mouvementeleverecapmouvmenteleve_edit');
        $session = $request->getSession();
        $user = $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();

        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $user = $this->get('security.context')->getToken()->getUser();
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            // $entities = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT M
             FROM SiseCoreBundle:MouvementeleveRecapmouvmenteleve M
             INNER JOIN SiseCoreBundle:NomenclatureNiveauscolaire P  WITH  M.codenivescol=P.codenivescol
             WHERE M.codeetab=:codeetab and M.codetypeetab=:codetypeetab and M.annescol=:annescol and M.coderece=:coderece
             ORDER BY P.ordraffi ASC, M.codefili ASC, M.codegenr DESC')->setParameter('codeetab', $codeetab)
                ->setParameter('codetypeetab', $codetypeetab)
                ->setParameter('annescol', $annescol)
                ->setParameter('coderece', $coderece);
            $entities = $query->execute();
            $pathUpdate = $this->generateUrl('mouvementeleverecapmouvmenteleve_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('mouvementeleve_recapmouvmenteleve');
        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:edit.html.twig', array(
            'entities' => @$entities,
            'nameclass' => @$nameclass,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
        ));
    }

    /**
     * Edits an existing MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('mouvementeleverecapmouvmenteleve_list');
        $session = $request->getSession();
        $user = $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $query = $em->createQuery(
            'SELECT M
             FROM SiseCoreBundle:MouvementeleveRecapmouvmenteleve M
             INNER JOIN SiseCoreBundle:NomenclatureNiveauscolaire P  WITH  M.codenivescol=P.codenivescol
             WHERE M.codeetab=:codeetab and M.codetypeetab=:codetypeetab and M.annescol=:annescol and M.coderece=:coderece
             ORDER BY P.ordraffi ASC, M.codefili ASC, M.codegenr DESC')->setParameter('codeetab', $codeetab)
            ->setParameter('codetypeetab', $codetypeetab)
            ->setParameter('annescol', $annescol)
            ->setParameter('coderece', $coderece);
        $entities = $query->execute();
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->findOneBy($items);
                $nombelev16octobre = $request->request->get('nombelev16octobre' . $i);
                $nombelevvenaautretab = $request->request->get('nombelevvenaautretab' . $i);
                $nombelevdeplautretab = $request->request->get('nombelevdeplautretab' . $i);
                $nombelevsepa = $request->request->get('nombelevsepa' . $i);
                $nombelevexcl = $request->request->get('nombelevexcl' . $i);
                $nombelev30juin = $request->request->get('nombelev30juin' . $i);
                $nombelevreus = $request->request->get('nombelevreus' . $i);
                $nombelevredo = $request->request->get('nombelevredo' . $i);
                $nombelevexcl30juin = $request->request->get('nombelevexcl30juin' . $i);
                $nombtotaelev = $nombelevreus + $nombelevredo + $nombelevexcl30juin;
                $item->setNombelev16octobre($nombelev16octobre);
                $item->setNombelevvenaautretab($nombelevvenaautretab);
                $item->setNombelevdeplautretab($nombelevdeplautretab);
                $item->setNombelevsepa($nombelevsepa);
                $item->setNombelevexcl($nombelevexcl);
                $item->setNombelev30juin($nombelev30juin);
                $item->setNombelevreus($nombelevreus);
                $item->setNombelevredo($nombelevredo);
                $item->setNombelevexcl30juin($nombelevexcl30juin);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('mouvementeleverecapmouvmenteleve_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('mouvementeleve_recapmouvmenteleve');
        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'nameclass' => @$nameclass,
            'pathfilter' => $url,
        ));
    }
}
