<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\SecuriteProfil;
use Sise\Bundle\CoreBundle\Form\SecuriteProfilType;
use Sise\Bundle\CoreBundle\Form\SecuriteDroitaccesgroupeType;
use Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe;

/**
 * SecuriteProfil controller.
 *
 */
class SecuriteProfilController extends Controller
{

    /**
     * Lists all SecuriteProfil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:SecuriteProfil')->findAll();

        return $this->render('SiseCoreBundle:SecuriteProfil:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new SecuriteProfil entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SecuriteProfil();
        $em = $this->getDoctrine()->getManager();
        // var_dump($entity); die;
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $accessForms = array();
        $packs = array();
        $entities = $em->getRepository('SiseCoreBundle:SecuriteEntite')->getEntities();
        foreach ($entities as $key => $en) {
            if ($en->getCodepack()) {
                $accessForms[$en->getCodepack()->getCodepack()][$key] = $this->createForm(new SecuriteDroitaccesgroupeType($en->getCodeenti()), new SecuriteDroitaccesgroupe())->createView();
                $packs[$en->getCodepack()->getCodepack()] = $en->getCodepack()->getLibepackar();
            }
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            foreach ($entities as $key => $en) {
                $params = $request->request->get($en->getCodeenti());
                $acess = new SecuriteDroitaccesgroupe($en, $entity);
                $acess->setDroisele((@$params['droisele'])?@$params['droisele']:'0');
                $acess->setDroiinse((@$params['droiinse'])?@$params['droiinse']:'0');
                $acess->setDroiupda((@$params['droiupda'])?@$params['droiupda']:'0');
                $acess->setDroidele((@$params['droidele'])?@$params['droidele']:'0');
                $em->persist($acess);
            }

            $em->flush();
            return $this->redirect($this->generateUrl('securite_roles'));
        }

        return $this->render('SiseCoreBundle:SecuriteProfil:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'accessForms' => $accessForms,
            'entities' => $entities,
            'packs' => $packs
        ));
    }

    /**
     * Creates a form to create a SecuriteProfil entity.
     *
     * @param SecuriteProfil $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SecuriteProfil $entity)
    {
        $form = $this->createForm(new SecuriteProfilType(), $entity, array(
            'action' => $this->generateUrl('securite_roles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SecuriteProfil entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new SecuriteProfil();
        $form = $this->createCreateForm($entity);
        $accessForms = array();
        $packs = array();
        $entities = $em->getRepository('SiseCoreBundle:SecuriteEntite')->getEntities();
        foreach ($entities as $key => $en) {
            if ($en->getCodepack()) {
                $accessForms[$en->getCodepack()->getCodepack()][$key] = $this->createForm(new SecuriteDroitaccesgroupeType($en->getCodeenti()), new SecuriteDroitaccesgroupe())->createView();
                $packs[$en->getCodepack()->getCodepack()] = $en->getCodepack()->getLibepackar();
            }
        }
        return $this->render('SiseCoreBundle:SecuriteProfil:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'accessForms' => $accessForms,
            'entities' => $entities,
            'packs' => $packs
        ));
    }

    /**
     * Finds and displays a SecuriteProfil entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:SecuriteProfil:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SecuriteProfil entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        $accessForms = array();
        $packs = array();
        $entities = $em->getRepository('SiseCoreBundle:SecuriteEntite')->getEntities();
        foreach ($entities as $key => $en) {
            if ($en->getCodepack()) {
                $access = $em->getRepository('SiseCoreBundle:SecuriteDroitaccesgroupe')->findOneBy(array('codeenti'=>$en->getCodeenti(), 'codeprof'=>$entity->getCodeprof()));
                if(!$access){
                    $access = new SecuriteDroitaccesgroupe($en, $entity);
                }
                $accessForms[$en->getCodepack()->getCodepack()][$key] = $this->createForm(new SecuriteDroitaccesgroupeType($en->getCodeenti()), $access)->createView();
                $packs[$en->getCodepack()->getCodepack()] = $en->getCodepack()->getLibepackar();
            }
        }
        return $this->render('SiseCoreBundle:SecuriteProfil:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'accessForms' => $accessForms,
            'entities' => $entities,
            'packs' => $packs
        ));
    }

    /**
     * Creates a form to edit a SecuriteProfil entity.
     *
     * @param SecuriteProfil $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(SecuriteProfil $entity)
    {
        $form = $this->createForm(new SecuriteProfilType(), $entity, array(
            'action' => $this->generateUrl('securite_roles_update', array('id' => $entity->getCodeprof())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing SecuriteProfil entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        $accessForms = array();
        $packs = array();
        $entities = $em->getRepository('SiseCoreBundle:SecuriteEntite')->getEntities();
        foreach ($entities as $key => $en) {
            if ($en->getCodepack()) {
                $access = $em->getRepository('SiseCoreBundle:SecuriteDroitaccesgroupe')->findOneBy(array('codeenti'=>$en->getCodeenti(), 'codeprof'=>$entity->getCodeprof()));
                if(!$access){
                    $access = new SecuriteDroitaccesgroupe($en, $entity);
                }
                $accessForms[$en->getCodepack()->getCodepack()][$key] = $this->createForm(new SecuriteDroitaccesgroupeType($en->getCodeenti()), $access)->createView();
                $packs[$en->getCodepack()->getCodepack()] = $en->getCodepack()->getLibepackar();
            }
        }


        if ($editForm->isValid()) {
            foreach ($entities as $key => $en) {
                $params = $request->request->get($en->getCodeenti());
                $acess = $em->getRepository('SiseCoreBundle:SecuriteDroitaccesgroupe')->findOneBy(array('codeenti'=>$en->getCodeenti(), 'codeprof'=>$entity->getCodeprof()));
                if(!$acess){
                    $acess = new SecuriteDroitaccesgroupe($en, $entity);
                }
                $acess->setDroisele((@$params['droisele'])?@$params['droisele']:'0');
                $acess->setDroiinse((@$params['droiinse'])?@$params['droiinse']:'0');
                $acess->setDroiupda((@$params['droiupda'])?@$params['droiupda']:'0');
                $acess->setDroidele((@$params['droidele'])?@$params['droidele']:'0');
                $em->persist($acess);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('securite_roles_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:SecuriteProfil:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'accessForms' => $accessForms,
            'entities' => $entities,
            'packs' => $packs
        ));
    }

    /**
     * Deletes a SecuriteProfil entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:SecuriteProfil')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SecuriteProfil entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('securite_roles'));
    }

    /**
     * Creates a form to delete a SecuriteProfil entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('securite_roles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
