<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Entity\OrientationFilieresportversgeneraletroisieme;
use Sise\Bundle\CoreBundle\Form\OrientationFilieresportversgeneraletroisiemeType;

/**
 * OrientationFilieresportversgeneraletroisieme controller.
 *
 */
class OrientationFilieresportversgeneraletroisiemeController extends Controller
{

    /**
     * Lists all OrientationFilieresportversgeneraletroisieme entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('orientationfilieresportversgeneraletroisieme_list');
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
            $entities = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab,'annescol' => $annescol, 'coderece' => $coderece));
            // $entitiesfili= $em->getRepository('SiseCoreBundle:NomenclatureFiliere')->findAll();
            $query = $em->createQuery(
                'SELECT F
             FROM SiseCoreBundle:NomenclatureFiliere F
             INNER JOIN SiseCoreBundle:NomenclatureFiliereniveauscolaire P  WITH  P.codefili=F.codefili
             WHERE P.codenivescol=:codenive3s Or P.codenivescol=:codenive4s
             ORDER BY F.ordraffi DESC')->setParameter('codenive3s','3S')
                                       ->setParameter('codenive4s','4S');
            $entitiesfili = $query->execute();
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:index.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'entitiesfili' => @$entitiesfili,
        ));
    }
    /**
     * Creates a new OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OrientationFilieresportversgeneraletroisieme();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orientationfilieresportversgeneraletroisieme_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OrientationFilieresportversgeneraletroisieme entity.
     *
     * @param OrientationFilieresportversgeneraletroisieme $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrientationFilieresportversgeneraletroisieme $entity)
    {
        $form = $this->createForm(new OrientationFilieresportversgeneraletroisiemeType(), $entity, array(
            'action' => $this->generateUrl('orientationfilieresportversgeneraletroisieme_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function newAction()
    {
        $entity = new OrientationFilieresportversgeneraletroisieme();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraletroisieme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme');//->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraletroisieme entity.');
        }

        $editForm = $this->createEditForm($entity);
      //  $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
       //     'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a OrientationFilieresportversgeneraletroisieme entity.
    *
    * @param OrientationFilieresportversgeneraletroisieme $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OrientationFilieresportversgeneraletroisieme $entity)
    {
        $form = $this->createForm(new OrientationFilieresportversgeneraletroisiemeType(), $entity, array(
            'action' => $this->generateUrl('orientationfilieresportversgeneraletroisieme_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraletroisieme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orientationfilieresportversgeneraletroisieme_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a OrientationFilieresportversgeneraletroisieme entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:OrientationFilieresportversgeneraletroisieme')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrientationFilieresportversgeneraletroisieme entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orientationfilieresportversgeneraletroisieme'));
    }

    /**
     * Creates a form to delete a OrientationFilieresportversgeneraletroisieme entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orientationfilieresportversgeneraletroisieme_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
