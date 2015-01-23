<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureAnneenaissanceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeannenais')
            ->add('libeannenaisar')
            ->add('libeannenaisfr')
            ->add('annenais')
            ->add('ordraffi')
            ->add('acti')
            ->add('codeannescol', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire',
                'property' => 'libeannescolar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
            ->add('codecyclense', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
                'property' => 'libecyclensear',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nomenclature_sise';
    }
}
