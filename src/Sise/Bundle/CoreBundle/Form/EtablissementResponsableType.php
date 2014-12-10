<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementResponsableType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idenuniqdire')
            ->add('nomprendire')
            ->add('ancidireense')
            ->add('ancidireadmi')
            ->add('telemobidire')
            ->add('maildire','email',array('required' => false))
            ->add('idenuniqdireadjo')
            ->add('nomprendireadjo')
            ->add('ancidireadjoense')
            ->add('ancidireadjoadmi')
            ->add('telemobidireadjo')
            ->add('maildireadjo','email',array('required' => false))
            ->add('codegraddire','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGrade',
                'property' => 'libegradar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --",
            ))
            ->add('codegraddireadjo','entity', array(
        'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGrade',
        'property' => 'libegradar',
        'expanded' => false,
        'multiple' => false,
        'required' => true,
        'empty_value' => "-- اختيار --",
    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementResponsable'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_etablissementresponsable';
    }
}
