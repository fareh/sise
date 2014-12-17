<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationFilieresport;
use Sise\Bundle\CoreBundle\Form\OrientationFilieresportType;

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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codefilitc Or P.codenivescol=:codefili2s
             ORDER BY F.ordraffi DESC')->setParameter('codefilitc', 'C')
                ->setParameter('codefili2s', '2S');
            $entitiesfili = $query->execute();
        }
        return $this->render('SiseCoreBundle:OrientationFilieresport:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
        ));
    }

    /**
     * Creates a new OrientationFilieresport entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OrientationFilieresport();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orientationfilieresport_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresport:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OrientationFilieresport entity.
     *
     * @param OrientationFilieresport $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrientationFilieresport $entity)
    {
        $form = $this->createForm(new OrientationFilieresportType(), $entity, array(
            'action' => $this->generateUrl('orientationfilieresport_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrientationFilieresport entity.
     *
     */
    public function newAction()
    {
        $entity = new OrientationFilieresport();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:OrientationFilieresport:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OrientationFilieresport entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationFilieresport:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OrientationFilieresport entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresport');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresport entity.');
        }

        $editForm = $this->createEditForm($entity);
        // $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationFilieresport:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //  'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a OrientationFilieresport entity.
     *
     * @param OrientationFilieresport $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(OrientationFilieresport $entity)
    {
        $form = $this->createForm(new OrientationFilieresportType(), $entity, array(
            'action' => $this->generateUrl('orientationfilieresport_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing OrientationFilieresport entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orientationfilieresport_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresport:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OrientationFilieresport entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresport')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrientationFilieresport entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orientationfilieresport'));
    }

    /**
     * Creates a form to delete a OrientationFilieresport entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orientationfilieresport_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
