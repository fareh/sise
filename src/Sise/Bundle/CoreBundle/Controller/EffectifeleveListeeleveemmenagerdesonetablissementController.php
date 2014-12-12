<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveListeeleveemmenagerdesonetablissement;
use Sise\Bundle\CoreBundle\Form\EffectifeleveListeeleveemmenagerdesonetablissementType;

/**
 * EffectifeleveListeeleveemmenagerdesonetablissement controller.
 *
 */
class EffectifeleveListeeleveemmenagerdesonetablissementController extends Controller
{

    /**
     * Lists all EffectifeleveListeeleveemmenagerdesonetablissement entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
        }
        return $this->render('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
        ));
    }
    /**
     * Creates a new EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EffectifeleveListeeleveemmenagerdesonetablissement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     * @param EffectifeleveListeeleveemmenagerdesonetablissement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EffectifeleveListeeleveemmenagerdesonetablissement $entity)
    {
        $form = $this->createForm(new EffectifeleveListeeleveemmenagerdesonetablissementType(), $entity, array(
            'action' => $this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     */
    public function newAction()
    {
        $entity = new EffectifeleveListeeleveemmenagerdesonetablissement();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectifeleveListeeleveemmenagerdesonetablissement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectifeleveListeeleveemmenagerdesonetablissement entity.');
        }

        $editForm = $this->createEditForm($entity);
       // $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        //    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EffectifeleveListeeleveemmenagerdesonetablissement entity.
    *
    * @param EffectifeleveListeeleveemmenagerdesonetablissement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EffectifeleveListeeleveemmenagerdesonetablissement $entity)
    {
        $form = $this->createForm(new EffectifeleveListeeleveemmenagerdesonetablissementType(), $entity, array(
            'action' => $this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectifeleveListeeleveemmenagerdesonetablissement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EffectifeleveListeeleveemmenagerdesonetablissement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeeleveemmenagerdesonetablissement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EffectifeleveListeeleveemmenagerdesonetablissement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement'));
    }

    /**
     * Creates a form to delete a EffectifeleveListeeleveemmenagerdesonetablissement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('effectifelevelisteeleveemmenagerdesonetablissement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
