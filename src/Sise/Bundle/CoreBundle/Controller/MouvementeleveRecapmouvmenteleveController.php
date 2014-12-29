<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\MouvementeleveRecapmouvmenteleve;
use Sise\Bundle\CoreBundle\Form\MouvementeleveRecapmouvmenteleveType;

/**
 * MouvementeleveRecapmouvmenteleve controller.
 *
 */
class MouvementeleveRecapmouvmenteleveController extends Controller
{

    /**
     * Lists all MouvementeleveRecapmouvmenteleve entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('mouvementeleverecapmouvmenteleve_list');
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
            // $entities = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
            $query = $em->createQuery(
                'SELECT M
             FROM SiseCoreBundle:MouvementeleveRecapmouvmenteleve M
             INNER JOIN SiseCoreBundle:NomenclatureNiveauscolaire P  WITH  M.codenivescol=P.codenivescol
             WHERE M.codeetab=:codeetab and M.codetypeetab=:codetypeetab and M.annescol=:annescol and M.coderece=:coderece
             ORDER BY P.ordraffi ASC, M.codefili ASC, M.codegenr DESC')->setParameter('codeetab', $codeetab)
                ->setParameter('codetypeetab', $codetypeetab)
                ->setParameter('annescol', $annescol)
                ->setParameter('coderece', $coderece);
            $entities = $query->execute();
        }


        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
        ));
    }

    /**
     * Creates a new MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MouvementeleveRecapmouvmenteleve();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mouvementeleverecapmouvmenteleve_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MouvementeleveRecapmouvmenteleve entity.
     *
     * @param MouvementeleveRecapmouvmenteleve $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MouvementeleveRecapmouvmenteleve $entity)
    {
        $form = $this->createForm(new MouvementeleveRecapmouvmenteleveType(), $entity, array(
            'action' => $this->generateUrl('mouvementeleverecapmouvmenteleve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function newAction()
    {
        $entity = new MouvementeleveRecapmouvmenteleve();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MouvementeleveRecapmouvmenteleve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MouvementeleveRecapmouvmenteleve entity.');
        }

        $editForm = $this->createEditForm($entity);
        //   $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a MouvementeleveRecapmouvmenteleve entity.
     *
     * @param MouvementeleveRecapmouvmenteleve $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(MouvementeleveRecapmouvmenteleve $entity)
    {
        $form = $this->createForm(new MouvementeleveRecapmouvmenteleveType(), $entity, array(
            'action' => $this->generateUrl('mouvementeleverecapmouvmenteleve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MouvementeleveRecapmouvmenteleve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mouvementeleverecapmouvmenteleve_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:MouvementeleveRecapmouvmenteleve:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MouvementeleveRecapmouvmenteleve entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:MouvementeleveRecapmouvmenteleve')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MouvementeleveRecapmouvmenteleve entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mouvementeleverecapmouvmenteleve'));
    }

    /**
     * Creates a form to delete a MouvementeleveRecapmouvmenteleve entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mouvementeleverecapmouvmenteleve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
