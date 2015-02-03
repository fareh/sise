<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\ParametreReglegestionquestionnaire;
use Sise\Bundle\CoreBundle\Form\ParametreReglegestionquestionnaireType;

/**
 * ParametreReglegestionquestionnaire controller.
 *
 */
class ParametreReglegestionquestionnaireController extends Controller
{

    /**
     * Lists all ParametreReglegestionquestionnaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:ParametreReglegestionquestionnaire')->findAll();

        return $this->render('SiseCoreBundle:ParametreReglegestionquestionnaire:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ParametreReglegestionquestionnaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ParametreReglegestionquestionnaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('parametrereglegestionquestionnaire_show', array('id' => $entity->getCodeparam())));
        }

        return $this->render('SiseCoreBundle:ParametreReglegestionquestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ParametreReglegestionquestionnaire entity.
     *
     * @param ParametreReglegestionquestionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ParametreReglegestionquestionnaire $entity)
    {
        $form = $this->createForm(new ParametreReglegestionquestionnaireType(), $entity, array(
            'action' => $this->generateUrl('parametrereglegestionquestionnaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ParametreReglegestionquestionnaire entity.
     *
     */
    public function newAction()
    {
        $entity = new ParametreReglegestionquestionnaire();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:ParametreReglegestionquestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ParametreReglegestionquestionnaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:ParametreReglegestionquestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ParametreReglegestionquestionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:ParametreReglegestionquestionnaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ParametreReglegestionquestionnaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:ParametreReglegestionquestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ParametreReglegestionquestionnaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:ParametreReglegestionquestionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ParametreReglegestionquestionnaire entity.
    *
    * @param ParametreReglegestionquestionnaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ParametreReglegestionquestionnaire $entity)
    {
        $form = $this->createForm(new ParametreReglegestionquestionnaireType(), $entity, array(
            'action' => $this->generateUrl('parametrereglegestionquestionnaire_update', array('id' => $entity->getCodeparam())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ParametreReglegestionquestionnaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:ParametreReglegestionquestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ParametreReglegestionquestionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('parametrereglegestionquestionnaire_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:ParametreReglegestionquestionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ParametreReglegestionquestionnaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:ParametreReglegestionquestionnaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ParametreReglegestionquestionnaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('parametrereglegestionquestionnaire'));
    }

    /**
     * Creates a form to delete a ParametreReglegestionquestionnaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parametrereglegestionquestionnaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
