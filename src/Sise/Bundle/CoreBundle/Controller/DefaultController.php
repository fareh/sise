<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Loader;
use Sise\Bundle\CoreBundle\Form\Search\SearchType;
use Sise\Bundle\CoreBundle\Entity\CoreProject;

class DefaultController extends Controller
{
    public  function  listEntitiesAction(){
        $entities = array();
        $em = $this->getDoctrine()->getManager();
        $meta = $em->getMetadataFactory()->getAllMetadata();
        foreach ($meta as $key => $m) {
                $entity = new CoreProject();
                $entity->setEntity($m->getName());
                $entity->setTableName($m->getTableName());
                $em->persist($entity);
                $em->flush();
            $entities[$key]['name'] = $m->getName();
            $entities[$key]['tableName'] = $m->getTableName();
        }

        die;


    }
    public function indexAction($name)
    {
        return $this->render('SiseCoreBundle:Default:index.html.twig', array('name' => $name));
    }


    /**
     * Lists all Menu entities.
     *
     */
    public function menuAction($PageContext, $TitleContextValue, $RouteAction)
    {
        //
        $TdExporter = false;
        $TdNouveau = false;
        $TdRetour = false;
        $TdEditer = false;
        $TdAnnuler = false;
        $TdSupprimer = false;
        $TdValider = false;
        $TdRechercher = false;
        $TdCloturer = false;
        //
        $RouteExporter = '';
        $RouteNouveau = '';
        $RouteRetour = '';
        $RouteEditer = '';
        $RouteAnnuler = '';
        $RouteSupprimer = '';
        $RouteValider = '';
        $RouteRechercher = '';
        $RouteCloturer = '';


        switch ($PageContext) {
            case 'List':
                //Mode List
                $TdExporter = true;
                $TdNouveau = true;
                //Router
                //if ($this->routeExists($RouteAction . '_export')) {
                $RouteExporter = $RouteAction . '_export';
                //};
                //
                //if ($this->routeExists($RouteAction + '_new')) {
                $RouteNouveau = $RouteAction . '_new';
                //};
                break;
            case 'ListFind':
                // Mode List avec un boutton de recherche
                $TdExporter = true;
                $TdNouveau = true;
                $TdRechercher = true;
                //if ($this->routeExists($RouteAction . '_export')) {
                $RouteExporter = $RouteAction . '_export';
                //}
                //if ($this->routeExists($RouteAction . '_new')) {
                $RouteNouveau = $RouteAction . '_new';
                //}
                //if ($this->routeExists($RouteAction . '_find')) {
                $RouteRechercher = $RouteAction . '_find';
                //}
                break;
            case 'Edit':
                //Mode Edition
                $TdValider = false;
                $TdRechercher = false;
                break;
            case 'New':
                //Mode New
                break;
        };

        return $this->render('SiseCoreBundle:Default:menu.html.twig',
            array('TitleContextValue' => $TitleContextValue,
                'TdExporter' => $TdExporter,
                'TdNouveau' => $TdNouveau,
                'TdRetour' => $TdRetour,
                'TdEditer' => $TdEditer,
                'TdAnnuler' => $TdAnnuler,
                'TdSupprimer' => $TdSupprimer,
                'TdValider' => $TdValider,
                'TdRechercher' => $TdRechercher,
                'TdCloturer' => $TdCloturer,
                'Route' => array('Exporter' => $RouteExporter,
                    'Nouveau' => $RouteNouveau,
                    'Rechercher' => $RouteRechercher,
                    'Retour' => $RouteRetour,
                    'Editer' => $RouteEditer,
                    'Annuler' => $RouteAnnuler,
                    'Supprimer' => $RouteSupprimer,
                    'Valider' => $RouteValider,
                    'Cloturer' => $RouteCloturer)
            ));


    }


    public function searchAction()
    {
        // Generation of the form
        $form = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();

        // return the form view
        return $this->render('SiseCoreBundle:Default:search.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function getListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $codegouv = '';
            $entity = '';
            $previous_select = '';
            $codegouv = $request->get('codegouv');
            $entity = $request->get('entity');
            $previous_select = $request->get('previous_select');
            if ($codegouv != '' and $entity != '' and $previous_select != '') {
                if ($entity == 'NomenclatureDelegation') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findByCodegouv($codegouv);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodedele();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibedelear();
                        $i++;
                    }
                } elseif ($entity == 'NomenclatureTypeetablissement') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findByConcrece(10);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodetypeetab();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibetypeetabar();
                        $i++;
                    }
                } elseif ($entity == 'NomenclatureEtablissement') {
                    $nomenclatureDelegations = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findByCodetypeetab($codegouv);
                    $json = array();
                    $json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';
                    $i = 1;
                    foreach ($nomenclatureDelegations as $nomenclatureDelegation) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureDelegation->getCodeetab();
                        $json[$i]['libelle'] = $nomenclatureDelegation->getLibeetabar();
                        $i++;
                    }
                } elseif ($entity == 'CodeEtab') {
                    $nomenclatureDelegation = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneByCodeetab($codegouv);
                    $json = array();
                    $json['code'] = $nomenclatureDelegation->getCodeetab();
                    $json['libelle'] = $nomenclatureDelegation->getLibeetabar();
                }
                $response = new Response();
                $data = json_encode($json); // c'est pour formater la réponse de la requete en format que jquery va comprendre
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }

        }
        return new Response('Erreur');
    }

}
