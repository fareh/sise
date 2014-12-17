<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationElevereussitroisiemeannee;
use Sise\Bundle\CoreBundle\Form\OrientationElevereussitroisiemeanneeType;

/**
 * OrientationElevereussitroisiemeannee controller.
 *
 */
class OrientationElevereussitroisiemeanneeController extends Controller
{

    /**
     * Lists all OrientationElevereussitroisiemeannee entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationelevereussitroisiemeannee_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive4s
             ORDER BY F.ordraffi DESC')->setParameter('codenive4s', '4S');
            $entitiesfili = $query->execute();
            $query1 = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s', '3S');
            $entitiesfili1 = $query1->execute();
        }
        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
            'entitiesfili1' => @$entitiesfili1,
        ));
    }

    /**
     * Creates a new OrientationElevereussitroisiemeannee entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OrientationElevereussitroisiemeannee();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orientationelevereussitroisiemeannee_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OrientationElevereussitroisiemeannee entity.
     *
     * @param OrientationElevereussitroisiemeannee $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrientationElevereussitroisiemeannee $entity)
    {
        $form = $this->createForm(new OrientationElevereussitroisiemeanneeType(), $entity, array(
            'action' => $this->generateUrl('orientationelevereussitroisiemeannee_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrientationElevereussitroisiemeannee entity.
     *
     */
    public function newAction()
    {
        $entity = new OrientationElevereussitroisiemeannee();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OrientationElevereussitroisiemeannee entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationElevereussitroisiemeannee entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OrientationElevereussitroisiemeannee entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationElevereussitroisiemeannee entity.');
        }

        $editForm = $this->createEditForm($entity);
        // $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a OrientationElevereussitroisiemeannee entity.
     *
     * @param OrientationElevereussitroisiemeannee $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(OrientationElevereussitroisiemeannee $entity)
    {
        $form = $this->createForm(new OrientationElevereussitroisiemeanneeType(), $entity, array(
            'action' => $this->generateUrl('orientationelevereussitroisiemeannee_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing OrientationElevereussitroisiemeannee entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationElevereussitroisiemeannee entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orientationelevereussitroisiemeannee_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:OrientationElevereussitroisiemeannee:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OrientationElevereussitroisiemeannee entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:OrientationElevereussitroisiemeannee')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrientationElevereussitroisiemeannee entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orientationelevereussitroisiemeannee'));
    }

    /**
     * Creates a form to delete a OrientationElevereussitroisiemeannee entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orientationelevereussitroisiemeannee_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
