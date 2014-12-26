<?php

namespace Sise\Bundle\CoreBundle\Form\search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchEtabType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomenclatureCirconscriptionregional', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'empty_value' => "-- اختيار --",
                'data' => 'codecircregi',
                'required' => false
            ))
            ->add('NomenclatureDelegation', 'choice', array(
                'empty_value' => "-- اختيار --",
                'required' => false
            ))
            ->add('NomenclatureCirconscription', 'choice', array(
                'empty_value' => "-- اختيار --",
                'required' => false
            ))
            ->add('NomenclatureTypeetablissement', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureTypeetablissement',
                'property' => 'libetypeetabar',
                'empty_value' => "-- اختيار --",
                'data' => 'codetypeetab',
                'required' => false
            ))
            ->add('NomenclatureSecteur', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureSecteur',
                'property' => 'libesectar',
                'empty_value' => "-- اختيار --",
                'data' => 'codesect',
                'required' => false
            ))
            ->add('NomenclatureZone', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureZone',
                'property' => 'libezonear',
                'empty_value' => "-- اختيار --",
                'data' => 'codezone',
                'required' => false
            ));

    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_searchetab';
    }
}
