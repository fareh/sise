<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur;
use Sise\Bundle\CoreBundle\Form\SecuriteGroupeutilisateurType;

/**
 * SecuriteGroupeutilisateur controller.
 *
 */
class SecuriteGroupeutilisateurController extends Controller
{

    /**
     * Lists all SecuriteGroupeutilisateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:SecuriteGroupeutilisateur')->findAll();

        return $this->render('SiseCoreBundle:SecuriteGroupeutilisateur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SecuriteGroupeutilisateur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SecuriteGroupeutilisateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('securite_groupeutilisateur_show', array('id' => $entity->getCodegrouutil())));
        }

        return $this->render('SiseCoreBundle:SecuriteGroupeutilisateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SecuriteGroupeutilisateur entity.
     *
     * @param SecuriteGroupeutilisateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SecuriteGroupeutilisateur $entity)
    {
        $form = $this->createForm(new SecuriteGroupeutilisateurType(), $entity, array(
            'action' => $this->generateUrl('securite_groupeutilisateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SecuriteGroupeutilisateur entity.
     *
     */
    public function newAction()
    {
        $entity = new SecuriteGroupeutilisateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:SecuriteGroupeutilisateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SecuriteGroupeutilisateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteGroupeutilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteGroupeutilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:SecuriteGroupeutilisateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SecuriteGroupeutilisateur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteGroupeutilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteGroupeutilisateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:SecuriteGroupeutilisateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SecuriteGroupeutilisateur entity.
    *
    * @param SecuriteGroupeutilisateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SecuriteGroupeutilisateur $entity)
    {
        $form = $this->createForm(new SecuriteGroupeutilisateurType(), $entity, array(
            'action' => $this->generateUrl('securite_groupeutilisateur_update', array('id' => $entity->getCodegrouutil())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SecuriteGroupeutilisateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteGroupeutilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteGroupeutilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('securite_groupeutilisateur_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:SecuriteGroupeutilisateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SecuriteGroupeutilisateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:SecuriteGroupeutilisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SecuriteGroupeutilisateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('securite_groupeutilisateur'));
    }

    /**
     * Creates a form to delete a SecuriteGroupeutilisateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('securite_groupeutilisateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
