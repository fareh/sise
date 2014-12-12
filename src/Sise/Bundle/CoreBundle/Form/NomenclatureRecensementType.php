<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureRecensementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coderece')
            ->add('liberecear')
            ->add('liberecefr')
            ->add('annescol','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire',
                'property' => 'libeannescolar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"))
            ->add('dateouve','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('dateclot','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('codeperisuivbudg')
            ->add('initques')
            ->add('obse')
            ->add('codeperi','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\ParametrePeriodicite',
                'property' => 'libeperiar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"))
            ->add('dureperi')
            ->add('codeetatrece','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtatrecensement',
                'property' => 'libeetatrecear',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureRecensement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_sisebundle_nomenclaturerecensement';
    }
}
