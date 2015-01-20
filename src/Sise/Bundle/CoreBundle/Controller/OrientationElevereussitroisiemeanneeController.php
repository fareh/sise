<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationElevereussitroisiemeannee;
use Sise\Bundle\CoreBundle\Form\OrientationElevereussitroisiemeanneeType;

/**
 * OrientationElevereussitroisiemeannee controller.
 *
 */
class OrientationElevereussitroisiemeanneeController extends Controller
{

    /**
     * Lists all OrientationElevereussitroisiemeannee entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationelevereussitroisiemeannee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codenive4s
             ORDER BY F.ordraffi DESC')->setParameter('codenive4s', '4S');
            $entitiesfili = $query->execute();
            $query1 = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codenive3s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S');
            $entitiesfili1 = $query1->execute();
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_elevereussitroisiemeannee');
        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'entitiesfili1' => @$entitiesfili1,
            'nameclass' => $nameclass,
        ));
    }

    /**
     * Displays a form to edit an existing OrientationElevereussitroisiemeannee entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationelevereussitroisiemeannee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codenive4s
             ORDER BY F.ordraffi DESC')->setParameter('codenive4s', '4S');
            $entitiesfili = $query->execute();
            $query1 = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codenive3s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S');
            $entitiesfili1 = $query1->execute();
            $pathUpdate = $this->generateUrl('orientationelevereussitroisiemeannee_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_elevereussitroisiemeannee');
        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'entitiesfili1' => @$entitiesfili1,
            'nameclass' => $nameclass,
            'pathUpdate' => @$pathUpdate,
        ));
    }

    /**
     * Edits an existing OrientationElevereussitroisiemeannee entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationelevereussitroisiemeannee_list');
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->findBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->findOneBy($items);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('orientationelevereussitroisiemeannee_edit'));
        }

        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'pathfilter' => $url,
        ));
    }
}
