<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnairerecensement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureRecensement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement;
use Sise\Bundle\CoreBundle\Form\NomenclatureQuestionnairerecensementType;
use Symfony\Component\Process\Process;

/**
 * NomenclatureQuestionnairerecensement controller.
 *
 */
class NomenclatureQuestionnairerecensementController extends Controller
{

    /**
     * Lists all NomenclatureQuestionnairerecensement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        ini_set('memory_limit', '256M');
        set_time_limit(0);
        $entities = $em->getRepository('SiseCoreBundle:NomenclatureRecensement')->findAll();
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('nomenclature_recensement');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnairerecensement:index.html.twig', array(
            'entities' => $entities,
            'nameclass' => $nameclass,
        ));
    }

    public function storedProcedure($proc_name,$annescol, $coderec, $p_CodeQues){
        $em = $this->getDoctrine()->getManager()->getConnection();
        $sth = $em->prepare("CALL ".$proc_name."(".$annescol.",'".$coderec."','".$p_CodeQues."');");
        $sth->execute();
        return true;
    }


    public function InitProcedure($proc_name,$annescol, $coderece){
        $em = $this->getDoctrine()->getManager()->getConnection();
        $sth = $em->prepare("CALL ".$proc_name."(".$annescol.",'".$coderece."');");
        $sth->execute();
        return true;
    }

    /**
     * Creates a new NomenclatureQuestionnairerecensement entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new NomenclatureQuestionnairerecensement();
        $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findAll();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $listques="";
        foreach($entity->getQues() as $en)
        {
            if($listques=="")
            {
                $listques = $listques . "\'" . $en->getCodeques() . "\'";
            }
            else
            {
                $listques = $listques . ",\'" . $en->getCodeques() . "\'";
            }
        }
            $entityrece = new NomenclatureRecensement();
            $entityrece->setCoderece($entity->getRece()->getCoderece());
            $entityrece->setLiberecear($entity->getRece()->getLiberecear());
            $entityrece->setAnnescol($entity->getRece()->getAnnescol());
            $entityrece->setDateouve($entity->getRece()->getDateouve());
            $entityrece->setDateclot($entity->getRece()->getDateclot());
            $entityrece->setCodeperi($entity->getRece()->getCodeperi());
            $entityrece->setObse($entity->getRece()->getObse());
            $entityetatrece=$em->getRepository('SiseCoreBundle:NomenclatureEtatrecensement')->findOneBy(array('codeetatrece' => '0'), array());
            $entityrece->setCodeetatrece($entityetatrece);
            $em->persist($entityrece);
            $em->flush();
        //  var_dump($entityrece);die;
       //     $ques = '\'EE7\',\'EE8\',\'EE9\'';
            $process = new Process('ls -lsa');
            $process->run(
                $this->storedProcedure('CreateRecensementQuestionnaire',$entity->getRece()->getAnnescol(),$entity->getRece()->getCoderece(),$listques),
             $this->InitProcedure('SP_Init_Questionnaire',$entity->getRece()->getAnnescol(),$entity->getRece()->getCoderece())
        );

            return $this->redirect($this->generateUrl('nomenclaturequestionnairerecensement'));
        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnairerecensement:new.html.twig', array(
            'entity' => $entity,
            'entities' => $entities,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureQuestionnairerecensement entity.
     *
     * @param NomenclatureQuestionnairerecensement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureQuestionnairerecensement $entity)
    {
        $form = $this->createForm(new NomenclatureQuestionnairerecensementType(), $entity, array(
            'action' => $this->generateUrl('nomenclaturequestionnairerecensement_create'),
            'method' => 'POST',
        ));

       //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureQuestionnairerecensement entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new NomenclatureQuestionnairerecensement();
        $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findAll();
        ini_set('memory_limit', '256M');
        set_time_limit(0);
        $form   = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureQuestionnairerecensement:new.html.twig', array(
            'entity' => $entity,
            'entities' => $entities,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnairerecensement entity.
     *
     */
    public function editAction($coderece,$annescol)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new NomenclatureQuestionnairerecensement();
        $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findAll();
        ini_set('memory_limit', '256M');
        set_time_limit(0);

       // $form   = $this->createCreateForm($entity);
     //   $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnairerecensement')->findBy(array('coderece' => $coderece, 'annescol' => $annescol), array());

      //  $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnairerecensement')->findOneBy(array('$codeques' => $codeques,'coderece' => $coderece,'codetypeetab' => $codetypeetab, 'codeetab' => $codeetab, 'annescol' => $annescol), array());
       // if (!$entity) {
       //     throw $this->createNotFoundException('Unable to find NomenclatureQuestionnairerecensement entity.');
       // }
        $entityrece = $em->getRepository('SiseCoreBundle:NomenclatureRecensement')->findOneBy(array('coderece' => $coderece, 'annescol' => $annescol), array());
 //var_dump($entityrece);die;
        $query = $em->createQuery(
            'SELECT  q
             FROM SiseCoreBundle:NomenclatureQuestionnairerecensement qr
             INNER JOIN SiseCoreBundle:NomenclatureQuestionnaire q WITH q.codeques=qr.codeques
             WHERE qr.coderece=:coderece and qr.annescol=:annescol')->setParameter('coderece',$coderece)
                                                                    ->setParameter('annescol',$annescol);
        $entityques = $query->execute();
        foreach($entityques as $entityque)
        {
        $entity->addQues($entityque);
        }
       // var_dump($entity->getQues());die;
        $entity->setRece($entityrece);
        $entity->setEtat('0');
        $entity->setEtatdireregi('0');
        $entity->setEtatdirecent('0');
        $form = $this->createEditForm($entity);

        //$em = $this->getDoctrine()->getManager();
       // $entity = new NomenclatureQuestionnairerecensement();
       // $entity->setQues($entityques);
       // $entity->setRece($entityrece);





        return $this->render('SiseCoreBundle:NomenclatureQuestionnairerecensement:edit.html.twig', array(
            'entity' => $entity,
            'entities' => $entities,
            'entityques' => $entityques,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to edit a NomenclatureQuestionnairerecensement entity.
    *
    * @param NomenclatureQuestionnairerecensement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NomenclatureQuestionnairerecensement $entity)
    {
        $form = $this->createForm(new NomenclatureQuestionnairerecensementType(), $entity, array(
            'action' => $this->generateUrl('nomenclaturequestionnairerecensement_update', array('coderece' => $entity->getRece()->getCoderece(),'annescol' => $entity->getRece()->getAnnescol())),
            'method' => 'PUT',
        ));

   //    $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NomenclatureQuestionnairerecensement entity.
     *
     */
    public function updateAction(Request $request,$coderece,$annescol)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new NomenclatureQuestionnairerecensement();
        $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findAll();
        ini_set('memory_limit', '256M');
        set_time_limit(0);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $listques="";
            foreach($entity->getQues() as $en)
            {
                if($listques=="")
                {
                    $listques = $listques . "\'" . $en->getCodeques() . "\'";
                }
                else
                {
                    $listques = $listques . ",\'" . $en->getCodeques() . "\'";
                }
            }
            $entityrece = $em->getRepository('SiseCoreBundle:NomenclatureRecensement')->findOneBy(array('coderece' => $coderece, 'annescol' => $annescol), array());
            $entityrece->setLiberecear($entity->getRece()->getLiberecear());
            $entityrece->setAnnescol($entity->getRece()->getAnnescol());
            $entityrece->setDateouve($entity->getRece()->getDateouve());
            $entityrece->setDateclot($entity->getRece()->getDateclot());
            $entityrece->setCodeperi($entity->getRece()->getCodeperi());
            $entityrece->setObse($entity->getRece()->getObse());
            $em->persist($entityrece);
            $em->flush();
            //  var_dump($entityrece);die;
            //     $ques = '\'EE7\',\'EE8\',\'EE9\'';
            $res = $this->storedProcedure('CreateRecensementQuestionnaire',$entity->getRece()->getAnnescol(),$entity->getRece()->getCoderece(),$listques);
            return $this->redirect($this->generateUrl('nomenclaturequestionnairerecensement'));        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnairerecensement:edit.html.twig', array(
            'entity' => $entity,
            'entities' => $entities,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Deletes a NomenclatureQuestionnairerecensement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnairerecensement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureQuestionnairerecensement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclaturequestionnairerecensement'));
    }

    /**
     * Creates a form to delete a NomenclatureQuestionnairerecensement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclaturequestionnairerecensement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
