<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationElevereussideuxiemeannee;
use Sise\Bundle\CoreBundle\Form\OrientationElevereussideuxiemeanneeType;

/**
 * OrientationElevereussideuxiemeannee controller.
 *
 */
class OrientationElevereussideuxiemeanneeController extends Controller
{

    /**
     * Lists all OrientationElevereussideuxiemeannee entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationelevereussideuxiemeannee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationElevereussideuxiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S');
            $entitiesfili = $query->execute();
            $query1 = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive2s
             ORDER BY F.ordraffi DESC')->setParameter('codenive2s', '2S');
            $entitiesfili1 = $query1->execute();
        }
        return $this->render('SiseCoreBundle:OrientationElevereussideuxiemeannee:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'entitiesfili1' => @$entitiesfili1,
        ));
    }

    /**
     * Creates a new OrientationElevereussideuxiemeannee entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OrientationElevereussideuxiemeannee();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orientationelevereussideuxiemeannee_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:OrientationElevereussideuxiemeannee:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OrientationElevereussideuxiemeannee entity.
     *
     * @param OrientationElevereussideuxiemeannee $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrientationElevereussideuxiemeannee $entity)
    {
        $form = $this->createForm(new OrientationElevereussideuxiemeanneeType(), $entity, array(
            'action' => $this->generateUrl('orientationelevereussideuxiemeannee_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrientationElevereussideuxiemeannee entity.
     *
     */
    public function newAction()
    {
        $entity = new OrientationElevereussideuxiemeannee();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:OrientationElevereussideuxiemeannee:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OrientationElevereussideuxiemeannee entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussideuxiemeannee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationElevereussideuxiemeannee entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationElevereussideuxiemeannee:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OrientationElevereussideuxiemeannee entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussideuxiemeannee');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationElevereussideuxiemeannee entity.');
        }

        $editForm = $this->createEditForm($entity);
        //  $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationElevereussideuxiemeannee:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a OrientationElevereussideuxiemeannee entity.
     *
     * @param OrientationElevereussideuxiemeannee $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(OrientationElevereussideuxiemeannee $entity)
    {
        $form = $this->createForm(new OrientationElevereussideuxiemeanneeType(), $entity, array(
            'action' => $this->generateUrl('orientationelevereussideuxiemeannee_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing OrientationElevereussideuxiemeannee entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussideuxiemeannee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationElevereussideuxiemeannee entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orientationelevereussideuxiemeannee_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:OrientationElevereussideuxiemeannee:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OrientationElevereussideuxiemeannee entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussideuxiemeannee')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrientationElevereussideuxiemeannee entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orientationelevereussideuxiemeannee'));
    }

    /**
     * Creates a form to delete a OrientationElevereussideuxiemeannee entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orientationelevereussideuxiemeannee_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
