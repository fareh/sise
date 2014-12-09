<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Form\search\SearchEtabType;
use Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement;
use Sise\Bundle\CoreBundle\Form\NomenclatureEtablissementType;


/**
 * NomenclatureEtablissement controller.
 *
 */
class NomenclatureEtablissementController extends Controller
{

    /**
     * Lists all NomenclatureEtablissement entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findAll();
        $searchetab = $this->container->get('form.factory')->createBuilder(new SearchEtabType())->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($searchetab->getName());
            $FiltreArray =array();

            if($params['NomenclatureCirconscriptionregional']!=''){$FiltreArray['codecircregi']= $params['NomenclatureCirconscriptionregional'];}
            if($params['NomenclatureDelegation']!=''){$FiltreArray['codedele']= $params['NomenclatureDelegation'];}
            if($params['NomenclatureCirconscription']!=''){$FiltreArray['codecirc']= $params['NomenclatureCirconscription'];}
            if($params['NomenclatureTypeetablissement']!=''){$FiltreArray['codetypeetab']= $params['NomenclatureTypeetablissement'];}
            if($params['NomenclatureSecteur']!=''){$FiltreArray['codesect']= $params['NomenclatureSecteur'];}
            if($params['NomenclatureZone']!=''){$FiltreArray['codezone']= $params['NomenclatureZone'];}
            $entities = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy($FiltreArray);


         //  var_dump($params); die ;
        }
        return $this->render('SiseCoreBundle:NomenclatureEtablissement:index.html.twig', array(
            'entities' => $entities,
            'searchetab' => $searchetab->createView(),
            'pathfilter' => ''
        ));
    }
    /**
     * Creates a new NomenclatureEtablissement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureEtablissement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclatureetablissement'));
        }

        return $this->render('SiseCoreBundle:NomenclatureEtablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureEtablissement entity.
     *
     * @param NomenclatureEtablissement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureEtablissement $entity)
    {
        $form = $this->createForm(new NomenclatureEtablissementType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureetablissement_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureEtablissement entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureEtablissement();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureEtablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NomenclatureEtablissement entity.
     *
     */
    public function showAction($codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureEtablissement entity.');
        }

        $deleteForm = $this->createDeleteForm($codeetab);

        return $this->render('SiseCoreBundle:NomenclatureEtablissement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureEtablissement entity.
     *
     */
    public function editAction($codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureEtablissement entity.');
        }

        $editForm = $this->createEditForm($entity);
   //   $deleteForm = $this->createDeleteForm($codeetab);

        return $this->render('SiseCoreBundle:NomenclatureEtablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        //  'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NomenclatureEtablissement entity.
    *
    * @param NomenclatureEtablissement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NomenclatureEtablissement $entity)
    {
        $form = $this->createForm(new NomenclatureEtablissementType(), $entity, array(
            'action' => $this->generateUrl('nomenclatureetablissement_update', array('codetypeetab'=> $entity->getCodetypeetab(), 'codeetab'=> $entity->getCodeetab())),
            'method' => 'PUT',
        ));

     //   $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NomenclatureEtablissement entity.
     *
     */
    public function updateAction(Request $request, $codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureEtablissement entity.');
        }

     //   $deleteForm = $this->createDeleteForm($codeetab);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nomenclatureetablissement_edit', array('codetypeetab'=> $entity->getCodetypeetab(), 'codeetab'=> $entity->getCodeetab())));
        }

        return $this->render('SiseCoreBundle:NomenclatureEtablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
          //  'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NomenclatureEtablissement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureEtablissement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclatureetablissement'));
    }

    /**
     * Creates a form to delete a NomenclatureEtablissement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclatureetablissement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
