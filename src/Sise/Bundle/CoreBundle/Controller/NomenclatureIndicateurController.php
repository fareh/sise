<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\NomenclatureIndicateur;
use Sise\Bundle\CoreBundle\Form\NomenclatureIndicateurType;

/**
 * NomenclatureIndicateur controller.
 *
 */
class NomenclatureIndicateurController extends Controller
{

    /**
     * Lists all NomenclatureIndicateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureIndicateur')->findAll();

        return $this->render('SiseCoreBundle:NomenclatureIndicateur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new NomenclatureIndicateur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureIndicateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclatureindicateur_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:NomenclatureIndicateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureIndicateur entity.
     *
     * @param NomenclatureIndicateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureIndicateur $entity)
    {
        $form = $this->createForm(new NomenclatureIndicateurType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureindicateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureIndicateur entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureIndicateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureIndicateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NomenclatureIndicateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureIndicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureIndicateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureIndicateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureIndicateur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureIndicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureIndicateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureIndicateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NomenclatureIndicateur entity.
    *
    * @param NomenclatureIndicateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NomenclatureIndicateur $entity)
    {
        $form = $this->createForm(new NomenclatureIndicateurType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureindicateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NomenclatureIndicateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureIndicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureIndicateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclatureindicateur_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:NomenclatureIndicateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NomenclatureIndicateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureIndicateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureIndicateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclatureindicateur'));
    }

    /**
     * Creates a form to delete a NomenclatureIndicateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclatureindicateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
