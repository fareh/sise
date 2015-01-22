<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCategorienationalite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureDegrehandicap;
use Sise\Bundle\CoreBundle\Entity\NomenclatureDiplome;
use Sise\Bundle\CoreBundle\Entity\NomenclatureFonction;
use Sise\Bundle\CoreBundle\Entity\NomenclatureGenre;
use Sise\Bundle\CoreBundle\Entity\NomenclatureLangueenseignement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureProfession;
use Sise\Bundle\CoreBundle\Entity\NomenclatureQualite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSituationadministrative;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSituationfamiliale;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypeaffectation;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypehandicap;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypecloture;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypelogement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureStatushabitant;
use Sise\Bundle\CoreBundle\Entity\NomenclatureProprietebatiment;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureRessouceeau;
use Sise\Bundle\CoreBundle\Entity\NomenclatureRessourceelectricite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureZone;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypeconnxioninternet;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSituationreseauelectriqueatelier;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTyperubriquebudgetaire;
use Sise\Bundle\CoreBundle\Entity\NomenclaturePeriodesuivibudget;
use Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieactivite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureGouvernorat;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSecteur;
use Sise\Bundle\CoreBundle\Entity\NomenclatureIndicateur;
use Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere;
use Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle;
use Sise\Bundle\CoreBundle\Entity\NomenclatureDiscipline;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSpecialite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypetravail;
use Sise\Bundle\CoreBundle\Entity\Nomenclatureheureenseignement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCauseremplacementprovisoire;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieespace;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieequipement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSourceprovonance;
use Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire;
use Sise\Bundle\CoreBundle\Entity\NomenclatureGrade;
use Sise\Bundle\CoreBundle\Entity\NomenclatureCorps;
use Sise\Bundle\CoreBundle\Entity\NomenclatureSoussituationadministrative;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTache;
use Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite;
use Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace;
/**
 * Nomenclature controller.
 *
 */
class NomenclatureController extends Controller
{

    /**
     * Lists all Nomenclature entities.
     *
     */
    public function indexAction($context)
    {
        $em = $this->getDoctrine()->getManager();

       // $entities = $em->getRepository('SiseCoreBundle:Nomenclature')->findAll();
        $query = $em->createQuery(
            'SELECT F
             FROM SiseCoreBundle:Nomenclature'.$context." ".'F');
        $entities = $query ->getArrayResult();
    //var_dump($entities);die;
        foreach($entities as $key=>$en)
        {
            $array[$key] = array_values($en);
        }
       //var_dump($array);die;
        return $this->render('SiseCoreBundle:Nomenclature:index.html.twig', array(
            'entities' => @$array,
            'context' => $context,
        ));
    }
    /**
     * Creates a new Nomenclature entity.
     *
     */
    public function createAction(Request $request,$context)
    {
        $contextList='Nomenclature'.$context;
        switch ($contextList) {
            case 'NomenclatureNiveauscolaire':
                $entity = new NomenclatureNiveauscolaire();
                break;
            case 'NomenclatureTypeespace':
                $entity = new NomenclatureTypeespace();
                break;
            case 'NomenclatureNationalite':
                $entity = new NomenclatureNationalite();
                break;
            case 'NomenclatureTache':
                $entity = new NomenclatureTache();
                break;
            case 'NomenclatureSoussituationadministrative':
                $entity = new NomenclatureSoussituationadministrative();
                break;
            case 'NomenclatureCorps':
                $entity = new NomenclatureCorps();
                break;
            case 'NomenclatureGrade':
                $entity = new NomenclatureGrade();
                break;
            case 'NomenclatureSpecialite':
                $entity = new NomenclatureSpecialite();
                break;
            case 'NomenclatureSourceProvonance':
                $entity = new NomenclatureSourceprovonance();
                break;
            case 'NomenclatureTypeEtablissement':
                $entity = new NomenclatureTypeetablissement();
                break;
            case 'NomenclatureTypeTravail':
                $entity = new NomenclatureTypetravail();
                break;
            case 'NomenclatureHeureEnseignement':
                $entity = new NomenclatureHeureenseignement();
                break;
            case 'NomenclatureCauseRemplacementProvisoire':
                $entity = new NomenclatureCauseremplacementprovisoire();
                break;
            case 'NomenclatureCategorieEspace':
                $entity = new NomenclatureCategorieespace();
                break;
            case 'NomenclatureCategorieEquipement':
                $entity = new NomenclatureCategorieequipement();
                break;
            case 'NomenclatureTypeCloture':
                $entity = new NomenclatureTypecloture();
                break;
            case 'NomenclatureFiliere':
                $entity = new NomenclatureFiliere();
                break;
            case 'NomenclatureMatiereOptionnelle':
                $entity = new NomenclatureMatiereoptionnelle();
                break;
            case 'NomenclatureDiscipline':
                $entity = new NomenclatureDiscipline();
                break;
            case 'NomenclatureTypeLogement':
                $entity = new NomenclatureTypelogement();
                break;
            case 'NomenclatureStatusHabitant':
                $entity = new NomenclatureStatushabitant();
                break;
            case 'NomenclatureProprieteBatiment':
                $entity = new NomenclatureProprietebatiment();
                break;
            case 'NomenclatureSituationCompteurEauElectricite':
                $entity = new NomenclatureSituationcompteureauelectricite();
                break;
            case 'NomenclatureRessouceEau':
                $entity = new NomenclatureRessouceeau();
                break;
            case 'NomenclatureRessourceElectricite':
                $entity = new NomenclatureRessourceelectricite();
                break;
            case 'NomenclatureZone':
                $entity = new NomenclatureZone();
                break;
            case 'NomenclatureTypeConnxionInternet':
                $entity = new NomenclatureTypeconnxioninternet();
                break;
            case 'NomenclatureSituationReseauElectriqueAtelier':
                $entity = new NomenclatureSituationreseauelectriqueatelier();
                break;
            case 'NomenclatureTypeRubriqueBudgetaire':
                $entity = new NomenclatureTyperubriquebudgetaire();
                break;
            case 'NomenclaturePeriodeSuiviBudget':
                $entity = new NomenclaturePeriodesuivibudget();
                break;
            case 'ParametreAnneeScolaire':
                $entity = new ParametreAnneescolaire();
                break;
            case 'NomenclatureCategorieActivite':
                $entity = new NomenclatureCategorieactivite();
                break;
            case 'NomenclatureGouvernorat':
                $entity = new NomenclatureGouvernorat();
                break;
            case 'NomenclatureSecteur':
                $entity = new NomenclatureSecteur();
                break;
            case 'NomenclatureIndicateur':
                $entity = new NomenclatureIndicateur();
                break;
            case 'NomenclatureCategorieNationalite':
                $entity = new NomenclatureCategorienationalite();
                break;
            case 'NomenclatureCycleEnseignement':
                $entity = new NomenclatureCycleenseignement();
                break;
            case 'NomenclatureDegreHandicap':
                $entity = new NomenclatureDegrehandicap();
                break;
            case 'NomenclatureDiplome':
                $entity = new NomenclatureDiplome();
                break;
            case 'NomenclatureFonction':
                $entity = new NomenclatureFonction();
                break;
            case 'NomenclatureGenre':
                $entity = new NomenclatureGenre();
                break;
            case 'NomenclatureLangueEnseignement':
                $entity = new NomenclatureLangueenseignement();
                break;
            case 'NomenclatureProfession':
                $entity = new NomenclatureProfession();
                break;
            case 'NomenclatureQualite':
                $entity = new NomenclatureQualite();
                break;
            case 'NomenclatureSituationAdministrative':
                $entity = new NomenclatureSituationadministrative();
                break;
            case 'NomenclatureSituationFamiliale':
                $entity = new NomenclatureSituationfamiliale();
                break;
            case 'NomenclatureTypeAffectation':
                $entity = new NomenclatureTypeaffectation();
                break;
            case 'NomenclatureTypeHandicap':
                $entity = new NomenclatureTypehandicap();
                break;
        }
       // var_dump($entity);die;
        $form = $this->createCreateForm($entity,$context);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('nomenclature', array('context' => $context)));

        }

        return $this->render('SiseCoreBundle:Nomenclature:new.html.twig', array(
            'entity' => $entity,
            'context' => $context,
            'form'   => $form->createView(),
        ));
    }

    /**
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm($entity,$context)
    {
        $form = $this->createForm($entity->getinstanceType(), $entity, array(
            'action' => $this->generateUrl('nomenclature_create', array('context' => $context)),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Nomenclature entity.
     *
     */
    public function newAction($context)
    {
        $contextList='Nomenclature'.$context;
        switch ($contextList) {
            case 'NomenclatureCorps':
                $entity = new NomenclatureCorps();
                break;
            case 'NomenclatureTypeespace':
                $entity = new NomenclatureTypeespace();
                break;
            case 'NomenclatureNationalite':
                $entity = new NomenclatureNationalite();
                break;
            case 'NomenclatureTache':
                $entity = new NomenclatureTache();
                break;
            case 'NomenclatureSoussituationadministrative':
                $entity = new NomenclatureSoussituationadministrative();
                break;
            case 'NomenclatureNiveauscolaire':
                $entity = new NomenclatureNiveauscolaire();
                break;
            case 'NomenclatureGrade':
                $entity = new NomenclatureGrade();
                break;
            case 'NomenclatureTypeEtablissement':
                $entity = new NomenclatureTypeetablissement();
                break;
            case 'NomenclatureSpecialite':
                $entity = new NomenclatureSpecialite();
                break;
            case 'NomenclatureSourceProvonance':
                $entity = new NomenclatureSourceprovonance();
                break;
            case 'NomenclatureTypeTravail':
                $entity = new NomenclatureTypetravail();
                break;
            case 'NomenclatureHeureEnseignement':
                $entity = new NomenclatureHeureenseignement();
                break;
            case 'NomenclatureCauseRemplacementProvisoire':
                $entity = new NomenclatureCauseremplacementprovisoire();
                break;
            case 'NomenclatureCategorieEspace':
                $entity = new NomenclatureCategorieespace();
                break;
            case 'NomenclatureCategorieEquipement':
                $entity = new NomenclatureCategorieequipement();
                break;
            case 'NomenclatureTypeCloture':
                $entity = new NomenclatureTypecloture();
                break;
            case 'NomenclatureFiliere':
                $entity = new NomenclatureFiliere();
                break;
            case 'NomenclatureMatiereOptionnelle':
                $entity = new NomenclatureMatiereoptionnelle();
                break;
            case 'NomenclatureDiscipline':
                $entity = new NomenclatureDiscipline();
                break;
            case 'NomenclatureTypeLogement':
                $entity = new NomenclatureTypelogement();
                break;
            case 'NomenclatureStatusHabitant':
                $entity = new NomenclatureStatushabitant();
                break;
            case 'NomenclatureProprieteBatiment':
                $entity = new NomenclatureProprietebatiment();
                break;
            case 'NomenclatureSituationCompteurEauElectricite':
                $entity = new NomenclatureSituationcompteureauelectricite();
                break;
            case 'NomenclatureRessouceEau':
                $entity = new NomenclatureRessouceeau();
                break;
            case 'NomenclatureRessourceElectricite':
                $entity = new NomenclatureRessourceelectricite();
                break;
            case 'NomenclatureZone':
                $entity = new NomenclatureZone();
                break;
            case 'NomenclatureTypeConnxionInternet':
                $entity = new NomenclatureTypeconnxioninternet();
                break;
            case 'NomenclatureSituationReseauElectriqueAtelier':
                $entity = new NomenclatureSituationreseauelectriqueatelier();
                break;
            case 'NomenclatureTypeRubriqueBudgetaire':
                $entity = new NomenclatureTyperubriquebudgetaire();
                break;
            case 'NomenclaturePeriodeSuiviBudget':
                $entity = new NomenclaturePeriodesuivibudget();
                break;
            case 'ParametreAnneeScolaire':
                $entity = new ParametreAnneescolaire();
                break;
            case 'NomenclatureCategorieActivite':
                $entity = new NomenclatureCategorieactivite();
                break;
            case 'NomenclatureGouvernorat':
                $entity = new NomenclatureGouvernorat();
                break;
            case 'NomenclatureSecteur':
                $entity = new NomenclatureSecteur();
                break;
            case 'NomenclatureIndicateur':
                $entity = new NomenclatureIndicateur();
                break;
            case 'NomenclatureCategorieNationalite':
                $entity = new NomenclatureCategorienationalite();
                break;
            case 'NomenclatureCycleEnseignement':
                $entity = new NomenclatureCycleenseignement();
                break;
            case 'NomenclatureDegreHandicap':
                $entity = new NomenclatureDegrehandicap();
                break;
            case 'NomenclatureDiplome':
                $entity = new NomenclatureDiplome();
                break;
            case 'NomenclatureFonction':
                $entity = new NomenclatureFonction();
                break;
            case 'NomenclatureGenre':
                $entity = new NomenclatureGenre();
                break;
            case 'NomenclatureLangueEnseignement':
                $entity = new NomenclatureLangueenseignement();
                break;
            case 'NomenclatureProfession':
                $entity = new NomenclatureProfession();
                break;
            case 'NomenclatureQualite':
                $entity = new NomenclatureQualite();
                break;
            case 'NomenclatureSituationAdministrative':
                $entity = new NomenclatureSituationadministrative();
                break;
            case 'NomenclatureSituationFamiliale':
                $entity = new NomenclatureSituationfamiliale();
                break;
            case 'NomenclatureTypeAffectation':
                $entity = new NomenclatureTypeaffectation();
                break;
            case 'NomenclatureTypeHandicap':
                $entity = new NomenclatureTypehandicap();
                break;
        }
        $index=$entity->iterateVisible();
        $tabnome=array();
        $tabnome[]='Filiere';
        $tabnome[]='Niveauscolaire';
        $tabnome[]='MatiereOptionnelle';
        $tabnome[]='Discipline';
        $tabnomecycl=array();
        $tabnomecycl[]='TypeTravail';
        $tabnomecycl[]='Corps';
        $tabnomecycl[]='Specialite';
        $tabnomecycl[]='SourceProvonance';
        $tabnomecycl[]='TypeEtablissement';
        $tabnomecycl[]='HeureEnseignement';
        $tabnomecycl[]='CauseRemplacementProvisoire';
        $tabnomecycl[]='CategorieEspace';
        $tabnomecycl[]='CategorieEquipement';
        $tabnomecycl[]='Typeespace';
        $tabnomepart=array();
        $tabnomepart[]='Niveauscolaire';
        $tabnomepart[]='Grade';
        $tabnomepart[]='Soussituationadministrative';
        $tabnomepart[]='Tache';
        $tabnomepart[]='Nationalite';
      //  var_dump($index);die;
        $form   = $this->createCreateForm($entity,$context);
        return $this->render('SiseCoreBundle:Nomenclature:new.html.twig', array(
            'entity' => $entity,
            'context' => $context,
            'tabnome' => $tabnome,
            'tabnomepart' => $tabnomepart,
            'tabnomecycl' => $tabnomecycl,
            'index' => $index,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Nomenclature entity.
     *
     */
    public function editAction($context,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:Nomenclature'.$context)->find($id);
       //var_dump($entity);die;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nomenclature entity.');
        }
       $index=$entity->iterateVisible();
       $editForm = $this->createEditForm($entity,$context);
       $tabnome=array();
       $tabnome[]='Filiere';
       $tabnome[]='MatiereOptionnelle';
       $tabnome[]='Discipline';
       $tabnomecycl=array();
       $tabnomecycl[]='TypeTravail';
       $tabnomecycl[]='Corps';
       $tabnomecycl[]='Specialite';
       $tabnomecycl[]='SourceProvonance';
       $tabnomecycl[]='HeureEnseignement';
       $tabnomecycl[]='TypeEtablissement';
       $tabnomecycl[]='CauseRemplacementProvisoire';
       $tabnomecycl[]='CategorieEspace';
       $tabnomecycl[]='CategorieEquipement';
       $tabnomecycl[]='Typeespace';
       $tabnomepart=array();
       $tabnomepart[]='Niveauscolaire';
       $tabnomepart[]='Grade';
       $tabnomepart[]='Soussituationadministrative';
       $tabnomepart[]='Tache';
       $tabnomepart[]='Nationalite';
     //   $deleteForm = $this->createDeleteForm($id);
       //$array = array_values($editForm);
     //var_dump($index[6]);die;
        return $this->render('SiseCoreBundle:Nomenclature:edit.html.twig', array(
            'entity'      => $entity,
            'index'      => $index,
            'context'      => $context,
            'tabnome'      => $tabnome,
            'tabnomecycl'      => $tabnomecycl,
            'tabnomepart'      => $tabnomepart,
            'edit_form'   => $editForm->createView(),
          //  'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity,$context)
    {
        $form = $this->createForm($entity->getinstanceType(), $entity, array(
            'action' => $this->generateUrl('nomenclature_update', array('context' => $context,'id' => $entity->getCode())),
            'method' => 'PUT'
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Nomenclature entity.
     *
     */
    public function updateAction(Request $request,$id,$context)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:Nomenclature'.$context)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nomenclature entity.');
        }

       // $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity,$context);
        $editForm->handleRequest($request);
       // $list='Nomenclature'.'\\'.$context;
       // var_dump($list);die;
        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('nomenclature', array('context' => $context)));
        }

        return $this->render('SiseCoreBundle:Nomenclature:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
           // 'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NomenclatureNiveauscolaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureNiveauscolaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureNiveauscolaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nomenclatureniveauscolaire'));
    }

    /**
     * Creates a form to delete a NomenclatureNiveauscolaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nomenclatureniveauscolaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Lists all Nomenclature entities.
     *
     */
    public function listAction()
    {
        return $this->render('SiseCoreBundle:Nomenclature:list.html.twig');
    }

    public function getNivScoAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $listeChoice = array();
            $listeChoice = $request->get('$listeChoice');
            if (count($listeChoice)>0) {
                    $nomenclatureNiveauscolaire = $em->getRepository('SiseCoreBundle:NomenclatureNiveauscolaire')->findByCodecyclense($listeChoice);
                    $json = array();
                    /*$json[0]['code'] = '';
                    $json[0]['libelle'] = '-- اختيار --';*/
                    $i = 1;
                    foreach ($nomenclatureNiveauscolaire as $nomenclatureNiveauscolaire) // pour transformer la réponse à ta requete en tableau qui replira le select2
                    {
                        $json[$i]['code'] = $nomenclatureNiveauscolaire->getCodenivescol();
                        $json[$i]['libelle'] = $nomenclatureNiveauscolaire->getLibenivescolar();
                        $i++;
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
