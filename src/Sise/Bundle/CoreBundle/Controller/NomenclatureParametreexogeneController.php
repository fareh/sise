<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene;
use Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogene;
use Sise\Bundle\CoreBundle\Form\NomenclatureParametreexogeneType;
use Sise\Bundle\CoreBundle\Form\NomenclatureValueexogeneType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * NomenclatureParametreexogene controller.
 *
 */
class NomenclatureParametreexogeneController extends Controller
{

    /**
     * Lists all NomenclatureParametreexogene entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureParametreexogene')->findAll();

        return $this->render('SiseCoreBundle:NomenclatureParametreexogene:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new NomenclatureParametreexogene entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureParametreexogene();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $params = $request->request->all();
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            foreach ($params as $key => $param) {
                if ($key != 'nomenclature_sise' and is_array($param)) {
                    $parametreexogene = new NomenclatureValueexogene();
                    $parametreexogene->setCodeparaexog($entity);
                    $parametreexogene->setTablnamefk($param['tablnamefk']);
                    $parametreexogene->setValeindi($param['valeindi']);
                    $em->persist($parametreexogene);
                }
            }
            $em->flush();
            return $this->redirect($this->generateUrl('nomenclatureparametreexogene'));
        }

        return $this->render('SiseCoreBundle:NomenclatureParametreexogene:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureParametreexogene entity.
     *
     * @param NomenclatureParametreexogene $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureParametreexogene $entity)
    {
        $form = $this->createForm(new NomenclatureParametreexogeneType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureparametreexogene_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureParametreexogene entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureParametreexogene();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureParametreexogene:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NomenclatureParametreexogene entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametreexogene')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureParametreexogene entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureParametreexogene:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a NomenclatureParametreexogene entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclatureparametreexogene_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing NomenclatureParametreexogene entity.
     *
     */
    public function editAction($id)
    {



        $em = $this->getDoctrine()->getManager();
        $editForms = array();
        $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametreexogene')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureParametreexogene entity.');
        }
        if (count($entity->getCodevalueexogene()) > 0) {
            foreach ($entity->getCodevalueexogene() as $key => $item) {
                $editForms[$item->getCodevalueexogene()] = $this->createValueexogeneForm($item, $entity->getChoicefk(), $item->getCodevalueexogene())->createView();
            }
        }



        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureParametreexogene:edit.html.twig', array(
            'entity' => $entity,
            'editForms' => @$editForms,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureValueexogene entity.
     *
     * @param NomenclatureValueexogene $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createValueexogeneForm(NomenclatureValueexogene $entity, $tablename = null, $newcompteur = null)
    {
        $form = $this->createForm(new NomenclatureValueexogeneType($tablename, $newcompteur), $entity);
        return $form;
    }

    /**
     * Creates a form to edit a NomenclatureParametreexogene entity.
     *
     * @param NomenclatureParametreexogene $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(NomenclatureParametreexogene $entity)
    {
        $form = $this->createForm(new NomenclatureParametreexogeneType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureparametreexogene_update', array('id' => $entity->getCodeparaexog())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing NomenclatureParametreexogene entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametreexogene')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureParametreexogene entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        $params = $request->request->all();
        if ($editForm->isValid()) {
            if (count($entity->getCodevalueexogene()) > 0) {
                foreach ($entity->getCodevalueexogene() as $key => $item) {
                    if ($item) {
                        $em->remove($item);
                    }

                }
            }
            foreach ($params as $key => $param) {
                if ($key != 'nomenclature_sise' and is_array($param)) {
                    $parametreexogene = new NomenclatureValueexogene();
                    $parametreexogene->setCodeparaexog($entity);
                    $parametreexogene->setTablnamefk($param['tablnamefk']);
                    $parametreexogene->setValeindi($param['valeindi']);
                    $em->persist($parametreexogene);
                }
            }
            $em->flush();
            return $this->redirect($this->generateUrl('nomenclatureparametreexogene'));
        }

        return $this->redirect($this->generateUrl('nomenclatureparametreexogene_edit', array('id' => $id)));
    }

    /**
     * Deletes a NomenclatureParametreexogene entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureParametreexogene')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureParametreexogene entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclatureparametreexogene'));
    }

    public function deleteItemAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $em = $this->getDoctrine()->getManager();
            $numeelev = "";
            $numeelev = $request->get('numeelev');
            if ($numeelev != '') {
                $item = $em->getRepository('SiseCoreBundle:NomenclatureValueexogene')->find($numeelev);
                if ($item) {
                    $em->remove($item);
                    $em->flush();
                }
                $response = new Response();
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent(json_encode(array(
                    'success' => true,
                    'data' => "" // Your data here
                )));
                return $response;


            } else {
                $response = new Response();
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent(json_encode(array(
                    'success' => true,
                    'data' => "" // Your data here
                )));
                return $response;

            }

        }
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode(array(
            'success' => false,
            'data' => "" // Your data here
        )));
        return $response;

    }

    public function itemAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $newcompteur = '';
            $newcompteur = $request->get('newcompteur');
            $tablename = $request->get('tablename');
            if ($newcompteur != '') {
                $form = $this->createValueexogeneForm(new NomenclatureValueexogene(), $tablename, $newcompteur)->createView();
                return $this->render('SiseCoreBundle:Default:prototype_nomenclature_parametreexogene.html.twig', array(
                    'form' => @$form,
                ));


            } else {
                return new Response("Erreur");
            }

        }

        return new Response("Erreur");
    }
}



