<?php

namespace Sise\Bundle\CoreBundle\Form\search;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\DataEvent;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class SearchType extends AbstractType
{

    private $session;
    private $features;
    /** @var \Doctrine\ORM\EntityManager */
    private $em;
    private $user;

    public function __construct($session = null, EntityManager $entityManager, $user)
    {
        $this->session = $session;
        if ($this->session != null and $this->session->has('features')) {
            $this->features = $this->session->get('features');
        } else {
            $this->features = array();
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
            $this->session->set("features", $params);
            $builder;
        } elseif ($this->user->getCodedele()) {
            $this->session->set("codedele", $this->user->getCodedele()->getCodedele());
            if (count($this->features) < 4) {

                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi(),
                    'data' => (@$this->features['NomenclatureCirconscriptionregional']) ? @$this->features['NomenclatureCirconscriptionregional'] : "-- اختيار --"
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele(),
                    'data' => (@$this->features['NomenclatureDelegation']) ? @$this->features['NomenclatureDelegation'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'data' => (@$this->features['NomenclatureTypeetablissement']) ? @$this->features['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));

                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"
                ))
                    ->add('CodeEtab', 'text');

            } else {
                $items = array();
                $items = $this->features;
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));

                $builder->add('NomenclatureDelegation', 'hidden', array(
                    'data' => $this->user->getCodedele()->getCodedele()
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'data' => $this->features['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab($this->features['NomenclatureTypeetablissement'], $this->features['NomenclatureDelegation']),
                    'data' => $this->features['NomenclatureEtablissement']
                ))
                    ->add('CodeEtab', 'text', array(
                        'attr' => array('value' => $this->features['NomenclatureEtablissement'])));

            }

        } elseif ($this->user->getCodecircregi()) {
            if (count($this->features) < 4) {
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));

                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($this->user->getCodecircregi()->getCodecircregi()),
                    'data' => (@$this->features['NomenclatureDelegation']) ? @$this->features['NomenclatureDelegation'] : ""
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'data' => (@$this->features['NomenclatureTypeetablissement']) ? @$this->features['NomenclatureTypeetablissement'] : "-- اختيار --"
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'data' => (@$this->features['NomenclatureEtablissement']) ? @$this->features['NomenclatureEtablissement'] : "-- اختيار --"
                ))
                    ->add('CodeEtab', 'text');

            } else {
                $items = array();
                $items = $this->features;
                $builder->add('NomenclatureCirconscriptionregional', 'hidden', array(
                    'data' => $this->user->getCodecircregi()->getCodecircregi()
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($this->user->getCodecircregi()->getCodecircregi()),
                    'data' => $this->features['NomenclatureDelegation']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'data' => $this->features['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab($this->features['NomenclatureTypeetablissement'], $this->features['NomenclatureDelegation']),
                    'data' => $this->features['NomenclatureEtablissement']
                ))
                    ->add('CodeEtab', 'text', array(
                        'attr' => array('value' => $this->features['NomenclatureEtablissement'])));

            }

        } else {
            if (count($this->features) < 4) {
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
                    'choices' => $this->getCirconscriptionregional(),
                    'data' => $this->features['NomenclatureCirconscriptionregional']
                ));
                $builder->add('NomenclatureDelegation', 'choice', array(
                    'choices' => $this->getDele($items["NomenclatureCirconscriptionregional"]),
                    'data' => $this->features['NomenclatureDelegation']
                ));
                $builder->add('NomenclatureTypeetablissement', 'choice', array(
                    'choices' => $this->getTypeEtab(),
                    'data' => $this->features['NomenclatureTypeetablissement']
                ));
                $builder->add('NomenclatureEtablissement', 'choice', array(
                    'choices' => $this->getEtab($this->features['NomenclatureTypeetablissement'], $this->features['NomenclatureDelegation']),
                    'data' => $this->features['NomenclatureEtablissement']
                ))
                    ->add('CodeEtab', 'text', array(
                        'attr' => array('value' => $this->features['NomenclatureEtablissement'])));

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

    public function getEtab($item1, $item2)
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findBy(array('codetypeetab' => $item1, 'codedele' => $item2));
        foreach ($entities as $entity) {
            $ids[$entity->getCodeetab()] = $entity->getCodeetab() . " | " . $entity->getLibeetabar();
        }
        return $ids;
    }

    public function getDele($item)
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureDelegation')->findBy(array('codecircregi' => $item));
        foreach ($entities as $entity) {
            $ids[$entity->getCodedele()] = $entity->getLibedelear();
        }
        return $ids;
    }

    public function getCirconscriptionregional()
    {

        $ids = array();
        $items = $this->features;
        $entities = $this->em->getRepository('SiseCoreBundle:NomenclatureCirconscriptionregional')->findAll();
        foreach ($entities as $entity) {
            $ids[$entity->getCodecircregi()] = $entity->getLibecircregiar();
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
