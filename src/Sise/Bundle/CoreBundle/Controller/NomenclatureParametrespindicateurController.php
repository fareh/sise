<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\NomenclatureParametrespindicateur;
use Sise\Bundle\CoreBundle\Form\NomenclatureParametrespindicateurType;

/**
 * NomenclatureParametrespindicateur controller.
 *
 */
class NomenclatureParametrespindicateurController extends Controller
{

    /**
     * Lists all NomenclatureParametrespindicateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureParametrespindicateur')->findAll();

        return $this->render('SiseCoreBundle:NomenclatureParametrespindicateur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new NomenclatureParametrespindicateur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureParametrespindicateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclatureparametrespindicateur_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:NomenclatureParametrespindicateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureParametrespindicateur entity.
     *
     * @param NomenclatureParametrespindicateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureParametrespindicateur $entity)
    {
        $form = $this->createForm(new NomenclatureParametrespindicateurType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureparametrespindicateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureParametrespindicateur entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureParametrespindicateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureParametrespindicateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NomenclatureParametrespindicateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametrespindicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureParametrespindicateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureParametrespindicateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureParametrespindicateur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametrespindicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureParametrespindicateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureParametrespindicateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NomenclatureParametrespindicateur entity.
    *
    * @param NomenclatureParametrespindicateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NomenclatureParametrespindicateur $entity)
    {
        $form = $this->createForm(new NomenclatureParametrespindicateurType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureparametrespindicateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NomenclatureParametrespindicateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametrespindicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureParametrespindicateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclatureparametrespindicateur_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:NomenclatureParametrespindicateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NomenclatureParametrespindicateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametrespindicateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureParametrespindicateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclatureparametrespindicateur'));
    }

    /**
     * Creates a form to delete a NomenclatureParametrespindicateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclatureparametrespindicateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
