<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnaire;
use Sise\Bundle\CoreBundle\Form\NomenclatureQuestionnaireType;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Form\EffectifeleveDemiresidantType;
use Sise\Bundle\CoreBundle\Form\EffectifeleveDemiresidantCollectionType;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveDemiresidant;


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
    public function statElevAction(Request $request, $codepack)
    {
        $em = $this->getDoctrine()->getManager();
        $prep = true;
        $prim = true;
        $collgene = true;
        $lyce = true;
        $colltech = true;
        $session = $request->getSession();
        $codetypeetab = $session->get('codetypeetab');
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        }

        $entitiestypeetab = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findOneByCodetypeetab($codetypeetab);
        //var_dump($entitiestypeetab); die;
        if ($entitiestypeetab) {

            $FilterArray = array();
            $FilterArray['codepack'] = $codepack;
            if ($prep == true and $entitiestypeetab->getPrep() == true) {
                $FilterArray['prep'] = true;
            }
            if ($prim == true and $entitiestypeetab->getPrim() == true) {
                $FilterArray['prim'] = true;
            }
            if ($collgene == true and $entitiestypeetab->getCollgene() == true) {
                $FilterArray['collgene'] = true;
            }
            if ($lyce == true and $entitiestypeetab->getLyce() == true) {
                $FilterArray['lyce'] = true;
            }
            if ($colltech == true and $entitiestypeetab->getColltech() == true) {
                $FilterArray['colltech'] = true;
            }


            $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findBy($FilterArray);//findByCodepack($codepack);

        } else {

            $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findByCodepack($codepack);
        }



        $Package = $em->getRepository('SiseCoreBundle:SecuritePackage')->findOneByCodepack($codepack);
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:statElev.html.twig', array(
            'entities' => $entities,
            'search' => $search->createView(),
            'pathfilter' => 'statElev',
            'Package' => $Package
        ));
    }




    public function getDistinct($tabs, $columName)
    {

        foreach ($tabs as $tab) {


        }


    }






    /**
     * Creates a form to edit a NomenclatureQuestionnaire entity.
     *
     * @param NomenclatureQuestionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCustomForm(EffectifeleveDemiresidant $entity)
    {
        $form = $this->createForm(new EffectifeleveDemiresidantType(), $entity, array(
            'action' => '',
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
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

            return $this->redirect($this->generateUrl('statElev_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
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
            'action' => $this->generateUrl('statElev_create'),
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
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
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
            'entity' => $entity,
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
            'action' => $this->generateUrl('statElev_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction111(Request $request, $id)
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

            return $this->redirect($this->generateUrl('statElev_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
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

        return $this->redirect($this->generateUrl('statElev'));
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
            ->setAction($this->generateUrl('statElev_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }


}
