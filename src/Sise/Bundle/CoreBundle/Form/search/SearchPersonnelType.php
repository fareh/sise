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
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi(),
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele(),
                ));
                $builder->add('NomenclatureTypeetablissement', 'hidden', array(
                    'data' => $this->user->getCodetypeetab()->getCodetypeetab(),
                ));
                $builder->add('NomenclatureEtablissement', 'hidden', array(
                    'data' => $this->user->getCodeetab()->getCodeetab(),
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $items = array();
                $items = $this->featurespers;
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi(),
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele(),
                ));
                $builder->add('NomenclatureTypeetablissement', 'hidden', array(
                    'data' => $this->user->getCodetypeetab()->getCodetypeetab(),
                ));
                $builder->add('NomenclatureEtablissement', 'hidden', array(
                    'data' => $this->user->getCodeetab()->getCodeetab(),
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureSoussituationadministrative']
                ));
            }
        } elseif ($this->user->getCodedele()) {
            $this->session->set("codedele", $this->user->getCodedele()->getCodedele());
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi(),
                    'data' => (@$this->featurespers['NomenclatureCirconscriptionregional']) ? @$this->featurespers['NomenclatureCirconscriptionregional'] : "-- اختيار --"
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele(),
                    'data' => (@$this->featurespers['NomenclatureDelegation']) ? @$this->featurespers['NomenclatureDelegation'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->featurespers['NomenclatureTypeetablissement']) ? @$this->featurespers['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $items = array();
                $items = $this->featurespers;
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele()
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab("",$this->user->getCodedele()),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureEtablissement']
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureSoussituationadministrative']
                ));
            }

        } elseif ($this->user->getCodecircregi()) {
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));

                $builder->add('NomenclatureDelegation', 'choice', array(
                    'required' => false,
                    'choices' => $this->getDele($this->user->getCodecircregi()->getCodecircregi()),
                    'empty_value' => "-- اختيار --",
                    'data' => (@$this->featurespers['NomenclatureDelegation']) ? @$this->featurespers['NomenclatureDelegation'] : ""
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->featurespers['NomenclatureTypeetablissement']) ? @$this->featurespers['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($this->user->getCodecircregi()->getCodecircregi()),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureDelegation']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab($this->user->getCodecircregi(),$this->featurespers['NomenclatureDelegation']),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureEtablissement']
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureSoussituationadministrative']
                ));
            }
        } else {
            if (count($this->featurespers) < 6) {
                $builder->add('NomenclatureCirconscriptionregional', 'entity', array(
                    'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                    'property' => 'libecircregiar',
                    'required' => false,
                    'empty_value' => "-- اختيار --"
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'required' => false));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureNationalite']) ? @$this->features['NomenclatureNationalite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureCorps']) ? @$this->features['NomenclatureCorps'] : "-- اختيار --"                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => (@$this->features['NomenclatureQualite']) ? @$this->features['NomenclatureQualite'] : "-- اختيار --"                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => (@$this->features['NomenclatureSoussituationadministrative']) ? @$this->features['NomenclatureSoussituationadministrative'] : "-- اختيار --"                ));
            } else {
                $items = array();
                $items = $this->featurespers;
                $builder->add('NomenclatureCirconscriptionregional', 'choice', array(
                    'choices' => $this->getCirconscriptionregional(),
                    'empty_value' => "-- اختيار --",
                    'required' => false,
                    'data' => $this->featurespers['NomenclatureCirconscriptionregional']
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($items["NomenclatureCirconscriptionregional"]),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => $this->featurespers['NomenclatureDelegation']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => $this->featurespers['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab($this->featurespers['NomenclatureCirconscriptionregional'],$this->featurespers['NomenclatureDelegation']),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => $this->featurespers['NomenclatureEtablissement']
                ));
                $builder->add('NomenclatureNationalite', 'choice', array(
                    'choices' => $this->getNationalite(),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => $this->featurespers['NomenclatureNationalite']
                ));
                $builder->add('NomenclatureCorps', 'choice', array(
                    'choices' => $this->getCorps(),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => $this->featurespers['NomenclatureCorps']
                ));
                $builder->add('NomenclatureQualite', 'choice', array(
                    'choices' => $this->getQualite(),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
                    'data' => $this->featurespers['NomenclatureQualite']
                ));
                $builder->add('NomenclatureSoussituationadministrative', 'choice', array(
                    'choices' => $this->getSoussituationadministrative(),
                    'required' => false,
                    'empty_value' => "-- اختيار --",
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

    public function getDele($item)
    {

        $ids = array();
        $items = $this->featurespers;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findBy(array('codecircregi' => $item));
        foreach ($entities as $entity) {
            $ids[$entity->getCodedele()] = $entity->getLibedelear();
        }
        return $ids;
    }
    public function getCirconscriptionregional()
    {

        $ids = array();
        $items = $this->featurespers;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCirconscriptionregional')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodecircregi()] = $entity->getLibecircregiar();
        }
        return $ids;
    }

    public function getEtab($item1,$item2)
    {
        if($item1!="" and $item2=="")
        {
        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array('codecircregi' => $item1));
        foreach ($entities as $entity) {
            $ids[$entity->getCodeetab()] = $entity->getCodeetab() . " | " . $entity->getLibeetabar();
        }
        return $ids;
        }elseif($item2!="" and $item1=="")
        {
            $ids = array();
            $items = $this->features;
            $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array('codedele' => $item2));
            foreach ($entities as $entity) {
                $ids[$entity->getCodeetab()] = $entity->getCodeetab() . " | " . $entity->getLibeetabar();
            }
            return $ids;
        }elseif($item1!="" and $item2!="")
        {
            $ids = array();
            $items = $this->features;
            $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array('codecircregi' => $item1,'codedele' => $item2));
            foreach ($entities as $entity) {
                $ids[$entity->getCodeetab()] = $entity->getCodeetab() . " | " . $entity->getLibeetabar();
            }
            return $ids;
        }
        else
        {
            $ids = array();
            $items = $this->features;
            $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findAll();
            foreach ($entities as $entity) {
                $ids[$entity->getCodeetab()] = $entity->getCodeetab() . " | " . $entity->getLibeetabar();
            }
            return $ids;
        }
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
