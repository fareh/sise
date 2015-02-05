<?php

namespace Sise\Bundle\CoreBundle\Form\search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;

class SearchPersonnelType extends AbstractType
{
    private $session;
    private $features;
    /** @var \Doctrine\ORM\EntityManager */
    private $em;
    private $user;

    public function __construct($session = null, EntityManager $entityManager, $user)
    {
        $this->session = $session;
        if ($this->session != null and $this->session->has('featurespers')) {
            $this->featurespers = $this->session->get('featurespers');
        } else {
            $this->featurespers = array();
        }
        $this->em = $entityManager;

        $this->user = $user;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($this->user->getCodeetab()) {
            $params = array(
                'NomenclatureCirconscriptionregional' => $this->user->getCodecircregi()->getCodecircregi(),
                'NomenclatureDelegation' => $this->user->getCodedele()->getCodedele(),
                'NomenclatureTypeetablissement' => $this->user->getCodetypeetab()->getCodetypeetab(),
                'NomenclatureEtablissement' => $this->user->getCodeetab()->getCodeetab()
            );
            $this->session->set("codedele", $this->user->getCodedele()->getCodedele());
            $this->session->set("codetypeetab", $this->user->getCodetypeetab()->getCodetypeetab());
            $this->session->set("codeetab", $this->user->getCodeetab()->getCodeetab());
            $this->session->set("featurespers", $params);
            $builder;
        } elseif ($this->user->getCodedele()) {
            $this->session->set("codedele", $this->user->getCodedele()->getCodedele());
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => (@$this->featurespers['NomenclatureTypeetablissement']) ? @$this->featurespers['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $items = array();
                $items = $this->featurespers;
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureEtablissement']
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureSoussituationadministrative']
                ));
            }

        } elseif ($this->user->getCodecircregi()) {
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => (@$this->featurespers['NomenclatureTypeetablissement']) ? @$this->featurespers['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureEtablissement']
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureSoussituationadministrative']
                ));
            }
        } else {
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => (@$this->featurespers['NomenclatureTypeetablissement']) ? @$this->featurespers['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $items = array();
                $items = $this->featurespers;
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureEtablissement']
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureSoussituationadministrative']
                ));
            }
        }
    }



    public function getTypeEtab()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodetypeetab()] = $entity->getLibetypeetabar();
        }
        return $ids;
    }

    public function getEtab()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodeetab()] = $entity->getCodeetab() . " | " . $entity->getLibeetabar();
        }
        return $ids;
    }

    public function getNationalite()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureNationalite')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodenati()] = $entity->getLibenatiar();
        }
        return $ids;
    }
    public function getCorps()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCorps')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodecorp()] = $entity->getLibecorpar();
        }
        return $ids;
    }
    public function getQualite()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureQualite')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodequal()] = $entity->getLibequalar();
        }
        return $ids;
    }

    public function getSoussituationadministrative()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureSoussituationadministrative')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodesoussituadmi()] = $entity->getLibesoussituadmiar();
        }
        return $ids;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_searchpersonnel';
    }
}
