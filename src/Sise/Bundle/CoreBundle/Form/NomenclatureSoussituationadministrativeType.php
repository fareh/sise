<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureSoussituationadministrativeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codesituadmi', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSituationadministrative',
                'property' => 'libesituadmiar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSoussituationadministrative'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_nomenclaturesoussituationadministrative';
    }
}
