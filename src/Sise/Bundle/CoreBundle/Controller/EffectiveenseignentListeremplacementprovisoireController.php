<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeremplacementprovisoire;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentListeremplacementprovisoireType;

/**
 * EffectiveenseignentListeremplacementprovisoire controller.
 *
 */
class EffectiveenseignentListeremplacementprovisoireController extends Controller
{

    /**
     * Lists all EffectiveenseignentListeremplacementprovisoire entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
        }
        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
        ));
    }
    /**
     * Creates a new EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EffectiveenseignentListeremplacementprovisoire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('effectiveenseignentlisteremplacementprovisoire_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EffectiveenseignentListeremplacementprovisoire entity.
     *
     * @param EffectiveenseignentListeremplacementprovisoire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EffectiveenseignentListeremplacementprovisoire $entity)
    {
        $form = $this->createForm(new EffectiveenseignentListeremplacementprovisoireType(), $entity, array(
            'action' => $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function newAction()
    {
        $entity = new EffectiveenseignentListeremplacementprovisoire();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectiveenseignentListeremplacementprovisoire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectiveenseignentListeremplacementprovisoire entity.');
        }

        $editForm = $this->createEditForm($entity);
     //   $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
       //     'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EffectiveenseignentListeremplacementprovisoire entity.
    *
    * @param EffectiveenseignentListeremplacementprovisoire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EffectiveenseignentListeremplacementprovisoire $entity)
    {
        $form = $this->createForm(new EffectiveenseignentListeremplacementprovisoireType(), $entity, array(
            'action' => $this->generateUrl('effectiveenseignentlisteremplacementprovisoire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectiveenseignentListeremplacementprovisoire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('effectiveenseignentlisteremplacementprovisoire_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EffectiveenseignentListeremplacementprovisoire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeremplacementprovisoire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EffectiveenseignentListeremplacementprovisoire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('effectiveenseignentlisteremplacementprovisoire'));
    }

    /**
     * Creates a form to delete a EffectiveenseignentListeremplacementprovisoire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('effectiveenseignentlisteremplacementprovisoire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
