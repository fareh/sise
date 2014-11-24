<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnaire;
use Sise\Bundle\CoreBundle\Form\NomenclatureQuestionnaireType;
use Sise\Bundle\CoreBundle\Form\Search\SearchType;


/**
 * NomenclatureQuestionnaire controller.
 *
 */
class NomenclatureQuestionnaireController extends Controller
{

    /**
     * Lists all NomenclatureQuestionnaire entities.
     *
     */
    public function statEleveAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findByCodepack("StatElev");
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:statEleve.html.twig', array(
            'entities' => $entities,
            'search'=>$search->createView(),
            'pathfilter'=>'statEleve'
        ));
    }


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction($table, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SiseCoreBundle:CoreProject')->findOneByTableName($table);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
        }
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $url = $this->generateUrl('StatEleve_edit', array('table' => $table));

        if ($request->isMethod('POST')) {
          $params= $request->request->get($search->getName());
            $entities = $em->getRepository($entity->getEntity())->findBy(array('codeetab'=>$params['NomenclatureEtablissement'], 'codetypeetab'=>$params['NomenclatureTypeetablissement'] ));
            foreach ( $entities as $nomenclature){


                echo $nomenclature->getCodeetab();

            }

        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.html.twig', array(
            'entity' => $entity,
            'entities'=>($entities)?$entities:'',
            'search'=>$search->createView(),
            'pathfilter'=> $url
        ));
    }
    /**
     * Creates a new NomenclatureQuestionnaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureQuestionnaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('StatEleve_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureQuestionnaire entity.
     *
     * @param NomenclatureQuestionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureQuestionnaire $entity)
    {
        $form = $this->createForm(new NomenclatureQuestionnaireType(), $entity, array(
            'action' => $this->generateUrl('StatEleve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureQuestionnaire entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureQuestionnaire();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NomenclatureQuestionnaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
    * Creates a form to edit a NomenclatureQuestionnaire entity.
    *
    * @param NomenclatureQuestionnaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NomenclatureQuestionnaire $entity)
    {
        $form = $this->createForm(new NomenclatureQuestionnaireType(), $entity, array(
            'action' => $this->generateUrl('StatEleve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('StatEleve_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NomenclatureQuestionnaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('StatEleve'));
    }

    /**
     * Creates a form to delete a NomenclatureQuestionnaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('StatEleve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
