<?php

namespace Sise\Bundle\CoreBundle\Form\search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;

class SearchEtabType extends AbstractType
{

    private $session;
    private $featuresetab;
    /** @var \Doctrine\ORM\EntityManager */
    private $em;
    private $user;

    public function __construct($session = null, EntityManager $entityManager, $user)
    {
        $this->session = $session;
        if ($this->session != null and $this->session->has('featuresetab')) {
            $this->featuresetab = $this->session->get('featuresetab');
        } else {
            $this->featuresetab = array();
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
            $this->session->set("featuresetab", $params);
            $builder;
        } elseif ($this->user->getCodedele()) {
            $this->session->set("codedele", $this->user->getCodedele()->getCodedele());
            if (count($this->featuresetab) < 6) {

                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi(),
                    'data' => (@$this->featuresetab['NomenclatureCirconscriptionregional']) ? @$this->featuresetab['NomenclatureCirconscriptionregional'] : "-- اختيار --"
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele(),
                    'data' => (@$this->featuresetab['NomenclatureDelegation']) ? @$this->featuresetab['NomenclatureDelegation'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureCirconscription', 'choice', array(
                    'choices' => $this->getCirconscription($this->user->getCodecircregi()->getCodegouv()),
                    'required' => false,
                    'data' => (@$this->featuresetab['NomenclatureCirconscription']) ? @$this->featuresetab['NomenclatureCirconscription'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => (@$this->featuresetab['NomenclatureTypeetablissement']) ? @$this->featuresetab['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureSecteur', 'choice', array(
                    'choices' => $this->getSecteur(),
                    'required' => false,
                    'data' => (@$this->featuresetab['NomenclatureSecteur']) ? @$this->featuresetab['NomenclatureSecteur'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureZone', 'choice', array(
                    'choices' => $this->getZone(),
                    'required' => false,
                    'data' => (@$this->featuresetab['NomenclatureZone']) ? @$this->featuresetab['NomenclatureZone'] : "-- اختيار --"
                ));

            } else {
                $items = array();
                $items = $this->featuresetab;
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele()
                ));
                $builder->add('NomenclatureCirconscription', 'choice', array(
                    'choices' => $this->getCirconscription($this->user->getCodecircregi()->getCodegouv()),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureCirconscription']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureSecteur', 'choice', array(
                    'choices' => $this->getSecteur(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureSecteur']
                ));
                $builder->add('NomenclatureZone', 'choice', array(
                    'choices' => $this->getZone(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureZone']
                ));


            }

        } elseif ($this->user->getCodecircregi()) {
            if (count($this->featuresetab) < 6) {
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));

                $builder->add('NomenclatureDelegation', 'choice', array(
                    'required' => false,
                    'choices' => $this->getDele($this->user->getCodecircregi()->getCodecircregi()),
                    'data' => (@$this->featuresetab['NomenclatureDelegation']) ? @$this->featuresetab['NomenclatureDelegation'] : ""
                ));
                $builder->add('NomenclatureCirconscription', 'choice', array(
                    'required' => false,
                    'choices' => $this->getCirconscription($this->user->getCodecircregi()->getCodegouv()),
                    'data' => (@$this->featuresetab['NomenclatureCirconscription']) ? @$this->featuresetab['NomenclatureCirconscription'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'required' => false,
                    'choices' => $this->getTypeEtab(),
                    'data' => (@$this->featuresetab['NomenclatureTypeetablissement']) ? @$this->featuresetab['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureSecteur', 'choice', array(
                    'required' => false,
                    'choices' => $this->getSecteur(),
                    'data' => (@$this->featuresetab['NomenclatureSecteur']) ? @$this->featuresetab['NomenclatureSecteur'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureZone', 'choice', array(
                    'required' => false,
                    'choices' => $this->getZone(),
                    'data' => (@$this->featuresetab['NomenclatureZone']) ? @$this->featuresetab['NomenclatureZone'] : "-- اختيار --"
                ));

            } else {
                $items = array();
                $items = $this->featuresetab;
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($this->user->getCodecircregi()->getCodecircregi()),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureDelegation']
                ));
                $builder->add('NomenclatureCirconscription', 'choice', array(
                    'choices' => $this->getCirconscription($this->user->getCodecircregi()->getCodegouv()),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureCirconscription']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureSecteur', 'choice', array(
                    'choices' => $this->getSecteur(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureSecteur']
                ));
                $builder->add('NomenclatureZone', 'choice', array(
                    'choices' => $this->getZone(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureZone']
                ));


            }

        } else {
            if (count($this->featuresetab) < 6) {
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
                $builder->add('NomenclatureCirconscription', 'choice', array(
                    'required' => false,
                    'empty_value' => "-- اختيار --",

                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                ));
                $builder->add('NomenclatureSecteur', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'choices' => $this->getSecteur(),
                    'required' => false,
                ));
                $builder->add('NomenclatureZone', 'choice', array(
                    'empty_value' => "-- اختيار --",
                    'choices' => $this->getZone(),
                    'required' => false,
                ));

            } else {
             //var_dump($this->featuresetab);die;
                $items = array();
                $items = $this->featuresetab;
                $builder->add('NomenclatureCirconscriptionregional', 'choice', array(
                    'choices' => $this->getCirconscriptionregional(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureCirconscriptionregional']
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($items["NomenclatureCirconscriptionregional"]),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureDelegation']
                ));
                $builder->add('NomenclatureCirconscription', 'choice', array(
                    'choices' => $this->getCirconscription("",$items["NomenclatureCirconscriptionregional"]),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureCirconscription']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureSecteur', 'choice', array(
                    'choices' => $this->getSecteur(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureSecteur']
                ));
                $builder->add('NomenclatureZone', 'choice', array(
                    'choices' => $this->getZone(),
                    'required' => false,
                    'data' => $this->featuresetab['NomenclatureZone']
                ));
            }
        }
    }


    public function getTypeEtab()
    {

        $ids = array();
        $items = $this->featuresetab;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodetypeetab()] = $entity->getLibetypeetabar();
        }
        return $ids;
    }
    public function getDele($item)
    {

        $ids = array();
        $items = $this->featuresetab;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findBy(array('codecircregi' => $item));
        foreach ($entities as $entity) {
            $ids[$entity->getCodedele()] = $entity->getLibedelear();
        }
        return $ids;
    }
    public function getCirconscriptionregional()
    {

        $ids = array();
        $items = $this->featuresetab;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCirconscriptionregional')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodecircregi()] = $entity->getLibecircregiar();
        }
        return $ids;
    }
    public function getCirconscription($item,$item2="")
    {
        if($item!="")
        {
            $ids = array();
            $items = $this->featuresetab;
            $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCirconscription')->findBy(array('codegouv' => $item));
            foreach ($entities as $entity) {
                $ids[$entity->getCodecirc()] = $entity->getLibecircar();
            }
            return $ids;
        }
       else
        {
            $ids = array();
            $items = $this->featuresetab;
            $entitycir=$this->em->getRepository('SiseCoreBundle:NomenclatureCirconscriptionregional')->findOneBy(array('codecircregi' => $item2));
            $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCirconscription')->findBy(array('codegouv' => $entitycir->getCodegouv()->getCodegouv()));
            foreach ($entities as $entity) {
                $ids[$entity->getCodecirc()] = $entity->getLibecircar();
            }
            return $ids;
        }
      }
    public function getSecteur()
    {

        $ids = array();
        $items = $this->featuresetab;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureSecteur')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodesect()] = $entity->getLibesectar();
        }
        return $ids;
    }
    public function getZone()
    {

        $ids = array();
        $items = $this->featuresetab;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureZone')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodezone()] = $entity->getLibezonear();
        }
        return $ids;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_searchetab';
    }
}
