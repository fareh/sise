<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EtablissementFicheetablissement;
use Sise\Bundle\CoreBundle\Form\EtablissementFicheetablissementType;
use Sise\Bundle\CoreBundle\Form\search\SearchEtabType;

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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        ini_set('memory_limit', '256M');
        set_time_limit(0);
        $user= $this->get('security.context')->getToken()->getUser();
        if ($user->getCodeetab())
        {
            //   var_dump($user->getCodetypeetab());die;
            return $this->redirect($this->generateUrl('etablissementficheetablissement_edit', array('codetypeetab' => $user->getCodetypeetab()->getCodetypeetab(), 'codeetab' => $user->getCodeetab()->getCodeetab(),'annescol' => $annescol, 'coderece' => $coderece)));
        }
        elseif ($user->getCodedele())
        {
            $query = $em->createQuery(
                'SELECT F,P
             FROM SiseCoreBundle:EtablissementFicheetablissement F
             INNER JOIN SiseCoreBundle:NomenclatureEtablissement P  WITH  P.codeetab=F.codeetab and P.codetypeetab=F.codetypeetab
              WHERE P.codedele=:codedeleuser and F.annescol=:annescoluser and F.coderece=:codereceuser')->setParameter('codedeleuser',$user->getCodedele()->getCodedele())
                                                                                                        ->setParameter('annescoluser',$annescol)
                                                                                                        ->setParameter('codereceuser',$coderece);
            $entities = $query->execute();
        }
        elseif ($user->getCodecircregi())
        {
            $query = $em->createQuery(
                'SELECT F,P
             FROM SiseCoreBundle:EtablissementFicheetablissement F
             INNER JOIN SiseCoreBundle:NomenclatureEtablissement P  WITH  P.codeetab=F.codeetab and P.codetypeetab=F.codetypeetab
              WHERE P.codecircregi=:codedeleuser and F.annescol=:annescoluser and F.coderece=:codereceuser')->setParameter('codedeleuser',$user->getCodecircregi()->getCodecircregi())
                                                                                                        ->setParameter('annescoluser',$annescol)
                                                                                                        ->setParameter('codereceuser',$coderece);
            $entities = $query->execute();

        }
        else
        {
            $entities = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findBy(array('annescol' => $annescol, 'coderece' => $coderece));
        }
        $searchetab = $this->container->get('form.factory')->createBuilder(new SearchEtabType($session, $em, $user))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($searchetab->getName());
            $FiltreArray = '';
            if ($params['NomenclatureCirconscriptionregional'] != '') {
                $FiltreArray .= " P.codecircregi ='" . $params['NomenclatureCirconscriptionregional'] . "'";
            }
            if ($params['NomenclatureDelegation'] != '') {
                $FiltreArray .= ($FiltreArray != '' ? ' and ' : '') . " P.codedele = '" . $params['NomenclatureDelegation'] . "'";
            }
            if ($params['NomenclatureCirconscription'] != '') {
                $FiltreArray .= ($FiltreArray != '' ? ' and ' : '') . "P.codecirc='" . $params['NomenclatureCirconscription'] . "'";
            }
            if ($params['NomenclatureTypeetablissement'] != '') {
                $FiltreArray .= ($FiltreArray != '' ? ' and ' : '') . "P.codetypeetab='" . $params['NomenclatureTypeetablissement'] . "'";
            }
            if ($params['NomenclatureSecteur'] != '') {
                $FiltreArray .= ($FiltreArray != '' ? ' and ' : '') . "P.codesect='" . $params['NomenclatureSecteur'] . "'";
            }
            if ($params['NomenclatureZone'] != '') {
                $FiltreArray .= ($FiltreArray != '' ? ' and ' : '') . "P.codezone='" . $params['NomenclatureZone'] . "'";
            }
            $query = $em->createQuery(
                'SELECT F,P
             FROM SiseCoreBundle:EtablissementFicheetablissement F
             INNER JOIN SiseCoreBundle:NomenclatureEtablissement P  WITH  P.codeetab=F.codeetab and P.codetypeetab=F.codetypeetab
              ' . ($FiltreArray != '' ? ' WHERE F.annescol=:annescoluser and F.coderece=:codereceuser and' . $FiltreArray : '')) ->setParameter('annescoluser',$annescol)
                                                                                                                                 ->setParameter('codereceuser',$coderece);;
            $entities = $query->execute();
            //        $items = array();
//        foreach ($entities as $item) {
//            if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement')) {
//                $items[$item->getCodeetab()][$item->getCodetypeetab()->getCodetypeetab()] = $item;
//            }
//       }
            // var_dump($entities);
            //   die;

        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('etablissement_ficheetablissement');

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:index.html.twig', array(
            'entities' => $entities,
            'nameclass' => $nameclass,
            'searchetab' => $searchetab->createView(),
            'pathfilter' => ''
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
            'form' => $form->createView(),
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

        //    $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EtablissementFicheetablissement entity.
     *
     */
    public function newAction()
    {
        $entity = new EtablissementFicheetablissement();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EtablissementFicheetablissement entity.
     *
     */
    public function editAction(Request $request, $codetypeetab, $codeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $entity = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        //$entityresp = $em->getRepository('SiseCoreBundle:EtablissementResponsable')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());
        //  $entityinfras = $em->getRepository('SiseCoreBundle:EtablissementInfrastructure')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab), array());
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementFicheetablissement entity.');
        }
        $editForm = $this->createEditForm($entity);
        //  $deleteForm = $this->createDeleteForm($id);
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('etablissement_ficheetablissement');
        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:edit.html.twig', array(
            'entity' => $entity,
            'nameclass' => $nameclass,
            'edit_form' => $editForm->createView(),
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
            'action' => $this->generateUrl('etablissementficheetablissement_update', array('codetypeetab' => $entity->getCodetypeetab(), 'codeetab' => $entity->getCodeetab(), 'annescol' => $entity->getAnnescol(), 'coderece' => $entity->getCoderece())),
            'method' => 'PUT',
        ));

        //  $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing EtablissementFicheetablissement entity.
     *
     */
    public function updateAction(Request $request, $codetypeetab, $codeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $entity = $em->getRepository('SiseCoreBundle:EtablissementFicheetablissement')->findOneBy(array('codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol, 'coderece' => $coderece), array());
        // var_dump($entity);die;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtablissementFicheetablissement entity.');
        }
        // $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etablissementficheetablissement_edit', array('codetypeetab' => $entity->getCodetypeetab(), 'codeetab' => $entity->getCodeetab(), 'annescol' => $entity->getAnnescol(), 'coderece' => $entity->getCoderece())));
        }

        return $this->render('SiseCoreBundle:EtablissementFicheetablissement:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //  'delete_form' => $deleteForm->createView(),
        ));
    }
}
