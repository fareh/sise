<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeenseignentTypeenseignement;
use Sise\Bundle\CoreBundle\Form\EffectiveenseignentListeenseignentTypeenseignementType;

/**
 * EffectiveenseignentListeenseignentTypeenseignement controller.
 *
 */
class EffectiveenseignentListeenseignentTypeenseignementController extends Controller
{

    /**
     * Lists all EffectiveenseignentListeenseignentTypeenseignement entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        return $this->render('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
        ));
    }

    /**
     * Creates a new EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EffectiveenseignentListeenseignentTypeenseignement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     * @param EffectiveenseignentListeenseignentTypeenseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EffectiveenseignentListeenseignentTypeenseignement $entity)
    {
        $form = $this->createForm(new EffectiveenseignentListeenseignentTypeenseignementType(), $entity, array(
            'action' => $this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     */
    public function newAction()
    {
        $entity = new EffectiveenseignentListeenseignentTypeenseignement();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectiveenseignentListeenseignentTypeenseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectiveenseignentListeenseignentTypeenseignement entity.');
        }

        $editForm = $this->createEditForm($entity);
        //   $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //     'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     * @param EffectiveenseignentListeenseignentTypeenseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(EffectiveenseignentListeenseignentTypeenseignement $entity)
    {
        $form = $this->createForm(new EffectiveenseignentListeenseignentTypeenseignementType(), $entity, array(
            'action' => $this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectiveenseignentListeenseignentTypeenseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EffectiveenseignentListeenseignentTypeenseignement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:EffectiveenseignentListeenseignentTypeenseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EffectiveenseignentListeenseignentTypeenseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement'));
    }

    /**
     * Creates a form to delete a EffectiveenseignentListeenseignentTypeenseignement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('effectiveenseignentlisteenseignenttypeenseignement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
