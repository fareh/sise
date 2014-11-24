<?php

namespace Sise\Bundle\CoreBundle\Form\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
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
                'data' => 'codecircregi'
            ))

            ->add('NomenclatureDelegation', 'choice', array(
                'empty_value' => "-- اختيار --"
            ))

            ->add('NomenclatureTypeetablissement', 'choice', array(
                'empty_value' => "-- اختيار --",
            ))
        ->add('NomenclatureEtablissement', 'choice', array(

            'empty_value' => "-- اختيار --",

        ))
        ->add('CodeEtab', 'text')

      ;

    }



    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_search';
    }
}
