<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\SecuriteProfil;
use Sise\Bundle\CoreBundle\Form\SecuriteProfilType;

/**
 * SecuriteProfil controller.
 *
 */
class SecuriteProfilController extends Controller
{

    /**
     * Lists all SecuriteProfil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:SecuriteProfil')->findAll();

        return $this->render('SiseCoreBundle:SecuriteProfil:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SecuriteProfil entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SecuriteProfil();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('securite_roles_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:SecuriteProfil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SecuriteProfil entity.
     *
     * @param SecuriteProfil $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SecuriteProfil $entity)
    {
        $form = $this->createForm(new SecuriteProfilType(), $entity, array(
            'action' => $this->generateUrl('securite_roles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SecuriteProfil entity.
     *
     */
    public function newAction()
    {
        $entity = new SecuriteProfil();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:SecuriteProfil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SecuriteProfil entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:SecuriteProfil:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SecuriteProfil entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:SecuriteProfil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SecuriteProfil entity.
    *
    * @param SecuriteProfil $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SecuriteProfil $entity)
    {
        $form = $this->createForm(new SecuriteProfilType(), $entity, array(
            'action' => $this->generateUrl('securite_roles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SecuriteProfil entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('securite_roles_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:SecuriteProfil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SecuriteProfil entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('securite_roles'));
    }

    /**
     * Creates a form to delete a SecuriteProfil entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('securite_roles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
