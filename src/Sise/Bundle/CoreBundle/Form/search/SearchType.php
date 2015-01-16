<?php

namespace Sise\Bundle\CoreBundle\Form\search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\DataEvent;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sise\Bundle\CoreBundle\Repository\NomenclatureEtablissementRepository;
use Doctrine\ORM\EntityManager;


use Sise\Bundle\CoreBundle\EventListener\SearchListener;

class SearchType extends AbstractType
{

    private $session;
    private $features;
    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct($session = null, EntityManager $entityManager)
    {
        $this->session = $session;
        if ($this->session != null and $this->session->has('features')) {
            $this->features = $this->session->get('features');
        } else {
            $this->features = array();
        }
        $this->em = $entityManager;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if (count($this->features) < 1) {

            $builder->add('NomenclatureCirconscriptionregional', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'empty_value' => "-- اختيار --"
            ));

            $builder->add('NomenclatureDelegation', 'choice', array(
                'empty_value' => "-- اختيار --"
            ));

            $builder->add('NomenclatureTypeetablissement', 'choice', array(
                'empty_value' => "-- اختيار --",
            ));

            $builder->add('NomenclatureEtablissement', 'choice', array(
                'empty_value' => "-- اختيار --",
            ))
                ->add('CodeEtab', 'text');

        } else {
            $items = array();
            $items = $this->features;
            $builder->add('NomenclatureCirconscriptionregional', 'choice', array(
                'choices'=>$this->getCirconscriptionregional(),
                'data' => $this->features['NomenclatureCirconscriptionregional']
            ));
            $builder->add('NomenclatureDelegation', 'choice', array(
                'choices'=>$this->getDele(),
                'data' => $this->features['NomenclatureDelegation']
            ));
            $builder->add('NomenclatureTypeetablissement', 'choice', array(
                'choices'=>$this->getTypeEtab(),
                'data' => $this->features['NomenclatureTypeetablissement']
            ));
            $builder->add('NomenclatureEtablissement', 'choice', array(
               'choices'=>$this->getEtab(),
                'data' => $this->features['NomenclatureEtablissement']
            ))
                ->add('CodeEtab', 'text', array(
                    'attr' => array('value' => $this->features['NomenclatureEtablissement'])));

        }
    }



    public function getCirconscriptionregional(){

        $ids = array();
        $items =$this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCirconscriptionregional')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodecircregi()] =$entity->getLibecircregiar();
        }
        return $ids;
    }



    public function getDele(){

        $ids = array();
        $items =$this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findBy(array('codecircregi'=>$items["NomenclatureCirconscriptionregional"]));
        foreach ($entities as $entity) {
            $ids[$entity->getCodedele()] =$entity->getLibedelear();
        }
        return $ids;
    }



    public function getTypeEtab(){

        $ids = array();
        $items =$this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodetypeetab()] =$entity->getLibetypeetabar();
        }
        return $ids;
    }

    public function getEtab(){

        $ids = array();
        $items =$this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array('codetypeetab' => $items['NomenclatureTypeetablissement'], 'codedele' => $items['NomenclatureDelegation']));
        foreach ($entities as $entity) {
            $ids[$entity->getCodeetab()] =$entity->getCodeetab()." | ". $entity->getLibeetabar();
        }
        return $ids;
    }

    // $builder->addEventSubscriber(new SearchListener());


    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_search';
    }
}
