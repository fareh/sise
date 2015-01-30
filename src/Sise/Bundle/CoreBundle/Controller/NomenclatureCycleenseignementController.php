<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement;
use Sise\Bundle\CoreBundle\Form\NomenclatureCycleenseignementType;

/**
 * NomenclatureCycleenseignement controller.
 *
 */
class NomenclatureCycleenseignementController extends Controller
{

    /**
     * Lists all NomenclatureCycleenseignement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureCycleenseignement')->findAll();
        return $this->render('SiseCoreBundle:NomenclatureCycleenseignement:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new NomenclatureCycleenseignement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureCycleenseignement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclaturecycleenseignement'));
        }

        return $this->render('SiseCoreBundle:NomenclatureCycleenseignement:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureCycleenseignement entity.
     *
     * @param NomenclatureCycleenseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureCycleenseignement $entity)
    {
        $form = $this->createForm(new NomenclatureCycleenseignementType(), $entity, array(
            'action' => $this->generateUrl('nomenclaturecycleenseignement_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureCycleenseignement entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureCycleenseignement();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureCycleenseignement:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureCycleenseignement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureCycleenseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureCycleenseignement entity.');
        }

        $editForm = $this->createEditForm($entity);
     //   $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureCycleenseignement:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
      //      'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a NomenclatureCycleenseignement entity.
     *
     * @param NomenclatureCycleenseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(NomenclatureCycleenseignement $entity)
    {
        $form = $this->createForm(new NomenclatureCycleenseignementType(), $entity, array(
            'action' => $this->generateUrl('nomenclaturecycleenseignement_update', array('id' => $entity->getCodecyclense())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing NomenclatureCycleenseignement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureCycleenseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureCycleenseignement entity.');
        }

      //  $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
//var_dump($entity);die;
        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclaturecycleenseignement'));
        }

        return $this->render('SiseCoreBundle:NomenclatureCycleenseignement:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
          //  'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NomenclatureCycleenseignement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureCycleenseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureCycleenseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclaturecycleenseignement'));
    }

    /**
     * Creates a form to delete a NomenclatureCycleenseignement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclaturecycleenseignement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
