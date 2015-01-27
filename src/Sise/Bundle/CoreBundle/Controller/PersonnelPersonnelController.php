<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchPersonnelType;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureSoussituationadministrativeType;
use Sise\Bundle\CoreBundle\Entity\PersonnelPersonnel;
use Sise\Bundle\CoreBundle\Form\PersonnelPersonnelType;

/**
 * PersonnelPersonnel controller.
 *
 */
class PersonnelPersonnelController extends Controller
{

    /**
     * Lists all PersonnelPersonnel entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //    $session = $request->getSession();
        $searchpersonnel = $this->container->get('form.factory')->createBuilder(new SearchPersonnelType())->getForm();
        $entities = $em->getRepository('SiseCoreBundle:PersonnelPersonnel')->findAll();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($searchpersonnel->getName());
            $FiltreArray = array();

            if ($params['NomenclatureTypeetablissement'] != '') {
                $FiltreArray['codetypeetab'] = $params['NomenclatureTypeetablissement'];
            }
            if ($params['NomenclatureEtablissement'] != '') {
                $FiltreArray['codeetab'] = $params['NomenclatureEtablissement'];
            }
            if ($params['NomenclatureNationalite'] != '') {
                $FiltreArray['codenati'] = $params['NomenclatureNationalite'];
            }
            if ($params['NomenclatureSoussituationadministrative'] != '') {
                $FiltreArray['codesoussituadmi'] = $params['NomenclatureSoussituationadministrative'];
            }
            if ($params['NomenclatureCorps'] != '') {
                $FiltreArray['codecorp'] = $params['NomenclatureCorps'];
            }
            if ($params['NomenclatureQualite'] != '') {
                $FiltreArray['codequal'] = $params['NomenclatureQualite'];
            }
            $entities = $em->getRepository('SiseCoreBundle:PersonnelPersonnel')->findBy($FiltreArray);


            //  var_dump($params); die ;
        }
        return $this->render('SiseCoreBundle:PersonnelPersonnel:index.html.twig', array(
            'entities' => $entities,
            'searchpersonnel' => $searchpersonnel->createView(),
            'pathfilter' => '',
        ));
    }

    /**
     * Creates a new PersonnelPersonnel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PersonnelPersonnel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personnelpersonnel'));
        }

        return $this->render('SiseCoreBundle:PersonnelPersonnel:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PersonnelPersonnel entity.
     *
     * @param PersonnelPersonnel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PersonnelPersonnel $entity)
    {
        $form = $this->createForm(new PersonnelPersonnelType(), $entity, array(
            'action' => $this->generateUrl('personnelpersonnel_create'),
            'method' => 'POST',
        ));

        // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PersonnelPersonnel entity.
     *
     */
    public function newAction()
    {
        $entity = new PersonnelPersonnel();
        $form = $this->createCreateForm($entity);
        $formpers = $this->container->get('form.factory')->createBuilder(new NomenclatureSoussituationadministrativeType())->getForm();
        return $this->render('SiseCoreBundle:PersonnelPersonnel:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'formpers' => $formpers->createView(),
        ));
    }

    /**
     * Finds and displays a PersonnelPersonnel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:PersonnelPersonnel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonnelPersonnel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:PersonnelPersonnel:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PersonnelPersonnel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:PersonnelPersonnel')->find($id);
        $formpers = $this->container->get('form.factory')->createBuilder(new NomenclatureSoussituationadministrativeType())->getForm();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonnelPersonnel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:PersonnelPersonnel:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'formpers' => $formpers->createView(),
        ));
    }

    /**
     * Creates a form to edit a PersonnelPersonnel entity.
     *
     * @param PersonnelPersonnel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(PersonnelPersonnel $entity)
    {
        $form = $this->createForm(new PersonnelPersonnelType(), $entity, array(
            'action' => $this->generateUrl('personnelpersonnel_update', array('id' => $entity->getIdenuniq())),
            'method' => 'PUT',
        ));

        // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing PersonnelPersonnel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:PersonnelPersonnel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonnelPersonnel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personnelpersonnel'));
        }

        return $this->render('SiseCoreBundle:PersonnelPersonnel:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PersonnelPersonnel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:PersonnelPersonnel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PersonnelPersonnel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personnelpersonnel'));
    }

    /**
     * Creates a form to delete a PersonnelPersonnel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnelpersonnel_delete1', array('id' => $id)))
            ->setMethod('DELETE')
            //   ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
