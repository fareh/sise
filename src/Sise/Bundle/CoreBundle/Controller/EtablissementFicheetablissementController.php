<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EtablissementFicheetablissement;
use Sise\Bundle\CoreBundle\Form\EtablissementFicheetablissementType;

/**
 * EtablissementFicheetablissement controller.
 *
 */
class EtablissementFicheetablissementController extends Controller
{

    /**
     * Lists all EtablissementFicheetablissement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT F,P
             FROM SiseCoreBundle:EtablissementFicheetablissement F
             INNER JOIN SiseCoreBundle:NomenclatureEtablissement P  WITH  P.codeetab=F.codeetab and P.codetypeetab=F.codetypeetab');
          $entities = $query->getResult();

        $items = array();
        foreach ($entities as $item) {
            if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement')) {
                $items[$item->getCodeetab()][$item->getCodetypeetab()->getCodetypeetab()] = $item;
            }
        }
       // $entities = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findAll();
        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:index.html.twig', array(
            'entities' => $entities,
            'items'=>$items
        ));
    }
    /**
     * Creates a new EtablissementFicheetablissement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EtablissementFicheetablissement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etablissementficheetablissement_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EtablissementFicheetablissement entity.
     *
     * @param EtablissementFicheetablissement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EtablissementFicheetablissement $entity)
    {
        $form = $this->createForm(new EtablissementFicheetablissementType(), $entity, array(
            'action' => $this->generateUrl('etablissementficheetablissement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EtablissementFicheetablissement entity.
     *
     */
    public function newAction()
    {
        $entity = new EtablissementFicheetablissement();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EtablissementFicheetablissement entity.
     *
     */
    public function showAction($codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementFicheetablissement entity.');
        }

       // $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:show.html.twig', array(
            'entity'      => $entity,
           // 'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EtablissementFicheetablissement entity.
     *
     */
    public function editAction($codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());
        //$entityresp = $em->getRepository('SiseCoreBundle:EtablissementResponsable')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());
       //  $entityinfras = $em->getRepository('SiseCoreBundle:EtablissementInfrastructure')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementFicheetablissement entity.');
        }

        $editForm = $this->createEditForm($entity);
      //  $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
          //  'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EtablissementFicheetablissement entity.
    *
    * @param EtablissementFicheetablissement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EtablissementFicheetablissement $entity)
    {
        $form = $this->createForm(new EtablissementFicheetablissementType(), $entity, array(
            'action' => $this->generateUrl('etablissementficheetablissement_update',array('codetypeetab'=> $entity->getCodetypeetab(), 'codeetab'=> $entity->getCodeetab())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EtablissementFicheetablissement entity.
     *
     */
    public function updateAction(Request $request,$codetypeetab,$codeetab)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementFicheetablissement entity.');
        }

       // $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etablissementficheetablissement_edit', array('codetypeetab'=> $entity->getCodetypeetab(), 'codeetab'=> $entity->getCodeetab())));
        }

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
          //  'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EtablissementFicheetablissement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EtablissementFicheetablissement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etablissementficheetablissement'));
    }

    /**
     * Creates a form to delete a EtablissementFicheetablissement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissementficheetablissement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
