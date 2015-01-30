<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureTypeconnxioninternetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codetypeconninte','text',array('label' => 'Code','translation_domain' => 'SiseCoreBundle'))
            ->add('libetypeconnintear','text',array('label' => 'Libear','translation_domain' => 'SiseCoreBundle'))
            ->add('libetypeconnintefr','text',array('label' => 'Libefr','translation_domain' => 'SiseCoreBundle'))
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeconnxioninternet'
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
