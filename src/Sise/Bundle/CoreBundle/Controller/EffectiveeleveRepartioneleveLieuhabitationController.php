<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/12/2014
 * Time: 09:52
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Form\EtablissementRecensementType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EffectiveeleveRepartioneleveLieuhabitation controller.
 *
 */
class EffectiveeleveRepartioneleveLieuhabitationController extends Controller
{

    public function editOlddAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AcmeTaskBundle:Task')->find($id);

        if (!$task) {
            throw $this->createNotFoundException('Aucune tâche trouvée pour cet id : ' . $id);
        }

        $originalTags = new ArrayCollection();

        // Crée un tableau contenant les objets Tag courants de la
        // base de données
        foreach ($task->getTags() as $tag) {
            $originalTags->add($tag);
        }

        $editForm = $this->createForm(new TaskType(), $task);

        if ($request->isMethod('POST')) {
            $editForm->handleRequest($this->getRequest());

            if ($editForm->isValid()) {

                // supprime la relation entre le tag et la « Task »
                foreach ($originalTags as $tag) {
                    if ($task->getTags()->contains($tag) == false) {
                        // supprime la « Task » du Tag
                        $tag->getTasks()->removeElement($task);

                        // si c'était une relation ManyToOne, vous pourriez supprimer la
                        // relation comme ceci
                        // $tag->setTask(null);

                        $em->persist($tag);

                        // si vous souhaitiez supprimer totalement le Tag, vous pourriez
                        // aussi faire comme cela
                        // $em->remove($tag);
                    }
                }

                $em->persist($task);
                $em->flush();

                // redirige vers quelconque page d'édition
                return $this->redirect($this->generateUrl('task_edit', array('id' => $id)));
            }
        }

        // affiche un template de formulaire quelconque
    }


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $url = $this->generateUrl('effectiveeleverepartionelevelieuhabitation_edit');
        $pathUpdate = $this->generateUrl('effectiveeleverepartionelevelieuhabitation_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            //$entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

            $entity = $em->getRepository('SiseCoreBundle:EtablissementRecensement')->findOneBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
            }

            $originalTags = new ArrayCollection();
            foreach ($entity->getLieuhabitation() as $lieuhabitation) {
                $originalTags->add($lieuhabitation);
            }
            $editForm = $this->createForm(new EtablissementRecensementType($entity->getCodeetab(), $entity->getCodetypeetab(), $em), $entity);
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_repartioneleve_lieuhabitation');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_repartioneleve_lieuhabitation.html.twig', array(
            'entity' => @$entity,
            'search' => $search->createView(),
            'editForm' => @$editForm->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectiveeleverepartionelevelieuhabitation_edit');
        $pathUpdate = $this->generateUrl('effectiveeleverepartionelevelieuhabitation_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entity = $em->getRepository('SiseCoreBundle:EtablissementRecensement')->findOneBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
            }

            $originalTags = new ArrayCollection();
            foreach ($entity->getLieuhabitation() as $lieuhabitation) {
                $originalTags->add($lieuhabitation);
            }
            $editForm = $this->createForm(new EtablissementRecensementType($entity->getCodeetab(), $entity->getCodetypeetab(), $em), $entity);
            if ($request->isMethod('POST')) {

                foreach ($entity->getLieuhabitation() as $lieuhabitation) {
                    $entity->removeLieuhabitation($lieuhabitation);
                    $em->persist($entity);
                }
                $editForm->handleRequest($request);
                /*  $postData = $request->request->get($editForm->getName());
                var_dump($postData);
                 die;*/
                foreach ($originalTags as $lieuhabitation) {
                    if ($entity->getLieuhabitation()->contains($lieuhabitation) == false) {
                        $lieuhabitation->getEtablissementRecensement()->removeLieuhabitation($lieuhabitation);
                        $em->persist($lieuhabitation);
                    }
                }
                foreach ($entity->getLieuhabitation() as $lieuhabitation) {
                    $lieuhabitation->setEtablissementRecensement($entity);
                    $lieuhabitation->setCodeetab($entity->getCodeetab());
                    $lieuhabitation->setCodetypeetab($entity->getCodetypeetab());
                    $lieuhabitation->setAnnescol($entity->getAnnescol());
                    $lieuhabitation->setCoderece($entity->getCoderece());
                }
                $em->persist($entity);
                $em->flush();
                // redirige vers quelconque page d'édition
                return $this->redirect($this->generateUrl('effectiveeleverepartionelevelieuhabitation_edit'));
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_repartioneleve_lieuhabitation');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_repartioneleve_lieuhabitation.html.twig', array(
            'entity' => @$entity,
            'search' => $search->createView(),
            'editForm' => @$editForm->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectiveeleverepartionelevelieuhabitation_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            // $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('annescol' => $annescol, 'coderece' => $coderece, 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveRepartioneleveLieuhabitation')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectiveeleve_repartioneleve_lieuhabitation');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_repartioneleve_lieuhabitation.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }


}