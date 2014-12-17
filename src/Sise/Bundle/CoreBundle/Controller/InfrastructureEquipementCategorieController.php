<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 18:00
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\InfrastructureEquipementCategorie;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * InfrastructureEquipementCategorie controller.
 *
 */
class InfrastructureEquipementCategorieController extends Controller {
    /**
     * Displays a form to edit an existing InfrastructureEquipementCategorie entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('infrastructureequipementcategorie_edit');
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("features", $params);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_equipement_categorie');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_equipement_categorie.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass'=>$nameclass
        ));
    }



    /**
     * Edits an existing InfrastructureEquipementCategorie entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('infrastructureequipementcategorie_edit');
        $pathUpdate = $this->generateUrl('infrastructureequipementcategorie_update', array( 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("_", $request->request->get('key_' . $i)), explode("_", $request->request->get('val_' . $i)));

                $item = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->findOneBy($items);

                if (!$item) {
                    throw $this->createNotFoundException('Unable to find SiseCoreBundle entity.');
                }
                $subdomains = $item->getCodedoma()->getCodesousdoma();
                $item->setNombclass($request->request->get('nombclass' . $i));
                $item->setNombelevmasc($request->request->get('nombelevmasc' . $i));
                $item->setNombelevfemi($request->request->get('nombelevfemi' . $i));
                $item->setNombtotaelev($request->request->get('nombtotaelev' . $i));
                $em->persist($item);
                foreach ($subdomains as $subdomain) {
                    $subdomain->setOrdraffi($request->request->get('codesousdoma_ordraffi_' . $subdomain->getCodesousdoma() . '_' . $i));
                    $em->persist($subdomain);
                }

                $em->flush();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_equipement_categorie');
        return $this->render('SiseCoreBundle:Infrastructure:edit.infrastructure_equipement_categorie.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass'=>$nameclass
        ));
    }


    /**
     * Displays a form to edit an existing InfrastructureEquipementCategorie entity.
     *
     */
    public function listAction(Request $request)
    {
        $rowspan = array();
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('infrastructureequipementcategorie_list');
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            //     $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol'=>$annescol, 'coderece'=>$coderece));

            $entities = $em->getRepository('SiseCoreBundle:InfrastructureEquipementCategorie')->getInfrastructureEquipement($codeetab, $codetypeetab,$annescol,$coderece);


            foreach($entities  as $key => $entity){
                $rowspan[$entity->getCodeequi()->getCodecateequi()->getCodecateequi()][$key]=$entity->getCodeequi()->getCodecateequi()->getCodecateequi();
            }
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('infrastructure_equipement_categorie');
        return $this->render('SiseCoreBundle:Infrastructure:list.infrastructure_equipement_categorie.html.twig', array(
            'entities' => @$entities,
            'rowspan'=>@$rowspan,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass'=>$nameclass
        ));
    }


} 