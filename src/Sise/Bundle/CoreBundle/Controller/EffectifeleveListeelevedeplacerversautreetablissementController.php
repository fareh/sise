<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\EffectifeleveListeelevedeplacerversautreetablissement;
use Sise\Bundle\CoreBundle\Form\EffectifeleveListeelevedeplacerversautreetablissementType;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
/**
 * EffectifeleveListeelevedeplacerversautreetablissement controller.
 *
 */
class EffectifeleveListeelevedeplacerversautreetablissementController extends Controller
{

    /**
     * Lists all EffectifeleveListeelevedeplacerversautreetablissement entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_list');
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
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
        }

       // $entities = $em->getRepository('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement')->findBy(array('annescol' => $annescol, 'coderece' => $coderece));

        return $this->render('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
        ));
    }





/**
     * Creates a new EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EffectifeleveListeelevedeplacerversautreetablissement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     * @param EffectifeleveListeelevedeplacerversautreetablissement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EffectifeleveListeelevedeplacerversautreetablissement $entity)
    {
        $form = $this->createForm(new EffectifeleveListeelevedeplacerversautreetablissementType(), $entity, array(
            'action' => $this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     */
    public function newAction()
    {
        $entity = new EffectifeleveListeelevedeplacerversautreetablissement();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectifeleveListeelevedeplacerversautreetablissement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("features", $params);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $url = $this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_edit');
        $pathUpdate = $this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_update', array( 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        return $this->render('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement:edit.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
        ));
    }

    /**
    * Creates a form to edit a EffectifeleveListeelevedeplacerversautreetablissement entity.
    *
    * @param EffectifeleveListeelevedeplacerversautreetablissement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EffectifeleveListeelevedeplacerversautreetablissement $entity)
    {
        $form = $this->createForm(new EffectifeleveListeelevedeplacerversautreetablissementType(), $entity, array(
            'action' => $this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     */
    public function updateAction(Request $request,$codeetab,$codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $annescol= $session->get('AnneScol');
        $coderece= $session->get('CodeRece');
        $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EffectifeleveListeelevedeplacerversautreetablissement entity.');
        }

    //    $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_edit'));
        }

        return $this->render('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
          //  'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EffectifeleveListeelevedeplacerversautreetablissement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:EffectifeleveListeelevedeplacerversautreetablissement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EffectifeleveListeelevedeplacerversautreetablissement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement'));
    }

    /**
     * Creates a form to delete a EffectifeleveListeelevedeplacerversautreetablissement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('effectifelevelisteelevedeplacerversautreetablissement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
