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
            ->add('codeannenais','text',array('label' => 'Code','translation_domain' => 'SiseCoreBundle'))
            ->add('libeannenaisar','text',array('label' => 'Libear','translation_domain' => 'SiseCoreBundle'))
            ->add('libeannenaisfr','text',array('label' => 'Libefr','translation_domain' => 'SiseCoreBundle'))
            ->add('annenais','integer',array('label' => 'annenais','translation_domain' => 'SiseCoreBundle'))
            ->add('ordraffi','integer',array('label' => 'ordraffi','translation_domain' => 'SiseCoreBundle'))
            ->add('acti','checkbox',array('label' => 'acti','translation_domain' => 'SiseCoreBundle'))
            ->add('codeannescol', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire',
                'property' => 'libeannescolar',
                'label' => 'codeannescol',
                'translation_domain' => 'SiseCoreBundle',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
            ->add('codecyclense', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
                'property' => 'libecyclensear',
                'label' => 'Codecycl',
                'translation_domain' => 'SiseCoreBundle',
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
