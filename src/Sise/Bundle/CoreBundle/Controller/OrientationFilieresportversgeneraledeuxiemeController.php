<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationFilieresportversgeneraledeuxieme;
use Sise\Bundle\CoreBundle\Form\OrientationFilieresportversgeneraledeuxiemeType;

/**
 * OrientationFilieresportversgeneraledeuxieme controller.
 *
 */
class OrientationFilieresportversgeneraledeuxiemeController extends Controller
{

    /**
     * Lists all OrientationFilieresportversgeneraledeuxieme entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraledeuxieme_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenivec Or P.codenivescol=:codenive2s
             ORDER BY F.ordraffi DESC')->setParameter('codenivec', 'C')
                ->setParameter('codenive2s', '2S');
            $entitiesfili = $query->execute();
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
        ));
    }

    /**
     * Creates a new OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OrientationFilieresportversgeneraledeuxieme();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orientationfilieresportversgeneraledeuxieme_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OrientationFilieresportversgeneraledeuxieme entity.
     *
     * @param OrientationFilieresportversgeneraledeuxieme $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrientationFilieresportversgeneraledeuxieme $entity)
    {
        $form = $this->createForm(new OrientationFilieresportversgeneraledeuxiemeType(), $entity, array(
            'action' => $this->generateUrl('orientationfilieresportversgeneraledeuxieme_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function newAction()
    {
        $entity = new OrientationFilieresportversgeneraledeuxieme();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraledeuxieme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraledeuxieme entity.');
        }

        $editForm = $this->createEditForm($entity);
        //   $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a OrientationFilieresportversgeneraledeuxieme entity.
     *
     * @param OrientationFilieresportversgeneraledeuxieme $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(OrientationFilieresportversgeneraledeuxieme $entity)
    {
        $form = $this->createForm(new OrientationFilieresportversgeneraledeuxiemeType(), $entity, array(
            'action' => $this->generateUrl('orientationfilieresportversgeneraledeuxieme_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraledeuxieme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orientationfilieresportversgeneraledeuxieme_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OrientationFilieresportversgeneraledeuxieme entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraledeuxieme')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraledeuxieme entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orientationfilieresportversgeneraledeuxieme'));
    }

    /**
     * Creates a form to delete a OrientationFilieresportversgeneraledeuxieme entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orientationfilieresportversgeneraledeuxieme_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
