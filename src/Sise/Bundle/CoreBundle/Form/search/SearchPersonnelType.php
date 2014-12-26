<?php

namespace Sise\Bundle\CoreBundle\Form\search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchPersonnelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomenclatureTypeetablissement', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement',
                'property' => 'libetypeetabar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('NomenclatureEtablissement', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement',
                'property' => 'libeetabar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('NomenclatureNationalite', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite',
                'property' => 'libenatiar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('NomenclatureSoussituationadministrative', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSoussituationadministrative',
                'property' => 'libesoussituadmiar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('NomenclatureCorps', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCorps',
                'property' => 'libecorpar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('NomenclatureQualite', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureQualite',
                'property' => 'libequalar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_searchpersonnel';
    }
}
