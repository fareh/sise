<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureMatiereoptionnelleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codematiopti','text',array('label' => 'Code','translation_domain' => 'SiseCoreBundle'))
            ->add('libematioptiar','text',array('label' => 'Libear','translation_domain' => 'SiseCoreBundle'))
            ->add('libematioptifr','text',array('label' => 'Libefr','translation_domain' => 'SiseCoreBundle'))
            ->add('codecycl', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
                'property' => 'libecyclensear',
                'label' => 'Codecycl',
                'translation_domain' => 'SiseCoreBundle',
                'expanded' => false,
                'multiple' => true,
                'required' => true,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codenivescol', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire',
                'property' => 'libenivescolar',
                'label' => 'Codescol',
                'translation_domain' => 'SiseCoreBundle',
                'expanded' => false,
                'multiple' => true,
                'required' => true,
            ))
            ->add('ordraffi','integer',array('label' => 'ordraffi','translation_domain' => 'SiseCoreBundle'))
            ->add('acti','checkbox',array('label' => 'acti','translation_domain' => 'SiseCoreBundle'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle'
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
