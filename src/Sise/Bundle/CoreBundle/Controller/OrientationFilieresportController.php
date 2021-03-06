<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationFilieresport;
use Sise\Bundle\CoreBundle\Entity\EtablissementFicheetablissement;
use Sise\Bundle\CoreBundle\Form\OrientationFiliereSportType;

/**
 * OrientationFilieresport controller.
 *
 */
class OrientationFilieresportController extends Controller
{

    /**
     * Lists all OrientationFilieresport entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresport_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codefilitc Or P.codenivescol=:codefili2s
             ORDER BY F.ordraffi DESC')
                ->setParameter('codefilitc', 'C')
                ->setParameter('codefili2s', '2S');
            $entitiesfili = $query->execute();


        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresport');
        return $this->render('SiseCoreBundle:OrientationFilieresport:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing OrientationFilieresport entity.
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
        $url = $this->generateUrl('orientationfilieresport_edit');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             JOIN  F.codenivescol P
             WHERE P.codenivescol=:codefilitc Or P.codenivescol=:codefili2s
             ORDER BY F.ordraffi DESC')->setParameter('codefilitc', 'C')
                ->setParameter('codefili2s', '2S');
            $entitiesfili = $query->execute();
            $pathUpdate = $this->generateUrl('orientationfilieresport_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('orientation_filieresport');

        return $this->render('SiseCoreBundle:OrientationFilieresport:edit.html.twig', array(
            'entities' => @$entities,
            'entitiesfili' => @$entitiesfili,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));


    }

    /**
     * Edits an existing OrientationFilieresport entity.
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresport_list');
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->findBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->findOneBy($items);
                $nombelevmasc = $request->request->get('nombelevmasc' . $i);
                $nombelevfemi = $request->request->get('nombelevfemi' . $i);
                $nombtotaelev = $nombelevmasc + $nombelevfemi;
                $item->setNombelevmasc($nombelevmasc);
                $item->setNombelevfemi($nombelevfemi);
                $item->setNombtotaelev($nombtotaelev);
                $em->persist($item);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('orientationfilieresport_edit'));
        }
        return $this->render('SiseCoreBundle:OrientationFilieresport:edit.html.twig', array(
            'search' => $search->createView(),
            'entities' => @$entities,
            'pathfilter' => $url,
        ));
    }
}
