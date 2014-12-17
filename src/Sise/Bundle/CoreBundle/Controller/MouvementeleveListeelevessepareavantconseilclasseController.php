<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\MouvementeleveListeelevessepareavantconseilclasse;
use Sise\Bundle\CoreBundle\Form\MouvementeleveListeelevessepareavantconseilclasseType;

/**
 * MouvementeleveListeelevessepareavantconseilclasse controller.
 *
 */
class MouvementeleveListeelevessepareavantconseilclasseController extends Controller
{

    /**
     * Lists all MouvementeleveListeelevessepareavantconseilclasse entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse_list');
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }

        return $this->render('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
        ));
    }

    /**
     * Creates a new MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MouvementeleveListeelevessepareavantconseilclasse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     * @param MouvementeleveListeelevessepareavantconseilclasse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MouvementeleveListeelevessepareavantconseilclasse $entity)
    {
        $form = $this->createForm(new MouvementeleveListeelevessepareavantconseilclasseType(), $entity, array(
            'action' => $this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     */
    public function newAction()
    {
        $entity = new MouvementeleveListeelevessepareavantconseilclasse();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MouvementeleveListeelevessepareavantconseilclasse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MouvementeleveListeelevessepareavantconseilclasse entity.');
        }

        $editForm = $this->createEditForm($entity);
        // $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     * @param MouvementeleveListeelevessepareavantconseilclasse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(MouvementeleveListeelevessepareavantconseilclasse $entity)
    {
        $form = $this->createForm(new MouvementeleveListeelevessepareavantconseilclasseType(), $entity, array(
            'action' => $this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MouvementeleveListeelevessepareavantconseilclasse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MouvementeleveListeelevessepareavantconseilclasse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:MouvementeleveListeelevessepareavantconseilclasse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MouvementeleveListeelevessepareavantconseilclasse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse'));
    }

    /**
     * Creates a form to delete a MouvementeleveListeelevessepareavantconseilclasse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mouvementelevelisteelevessepareavantconseilclasse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
