<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\EtablissementCycleenseignement;
use Sise\Bundle\CoreBundle\Form\EtablissementCycleenseignementType;

/**
 * EtablissementCycleenseignement controller.
 *
 */
class EtablissementCycleenseignementController extends Controller
{

    /**
     * Lists all EtablissementCycleenseignement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findAll();

        return $this->render('SiseCoreBundle:EtablissementCycleenseignement:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EtablissementCycleenseignement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EtablissementCycleenseignement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etablissementcycleenseignement_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:EtablissementCycleenseignement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EtablissementCycleenseignement entity.
     *
     * @param EtablissementCycleenseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EtablissementCycleenseignement $entity)
    {
        $form = $this->createForm(new EtablissementCycleenseignementType(), $entity, array(
            'action' => $this->generateUrl('etablissementcycleenseignement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EtablissementCycleenseignement entity.
     *
     */
    public function newAction()
    {

        $entity = new EtablissementCycleenseignement();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EtablissementCycleenseignement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EtablissementCycleenseignement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EtablissementCycleenseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementCycleenseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EtablissementCycleenseignement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EtablissementCycleenseignement entity.
     *
     */
    public function editAction($codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EtablissementCycleenseignement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementCycleenseignement entity.');
        }

        $editForm = $this->createEditForm($entity);
        // $deleteForm = $this->createDeleteForm($codeetab);

        return $this->render('SiseCoreBundle:EtablissementCycleenseignement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //     'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a EtablissementCycleenseignement entity.
     *
     * @param EtablissementCycleenseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(EtablissementCycleenseignement $entity)
    {
        $form = $this->createForm(new EtablissementCycleenseignementType(), $entity, array(
            'action' => $this->generateUrl('etablissementcycleenseignement_update',array('codetypeetab'=> $entity->getCodetypeetab(), 'codeetab'=> $entity->getCodeetab())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EtablissementCycleenseignement entity.
     *
     */
    public function updateAction(Request $request, $codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EtablissementCycleenseignement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementCycleenseignement entity.');
        }

        // $deleteForm = $this->createDeleteForm($codeetab);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etablissementcycleenseignement_edit', array('codetypeetab'=> $entity->getCodetypeetab(), 'codeetab'=> $entity->getCodeetab())));
        }

        return $this->render('SiseCoreBundle:EtablissementCycleenseignement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //   'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EtablissementCycleenseignement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:EtablissementCycleenseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EtablissementCycleenseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etablissementcycleenseignement'));
    }

    /**
     * Creates a form to delete a EtablissementCycleenseignement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissementcycleenseignement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}
