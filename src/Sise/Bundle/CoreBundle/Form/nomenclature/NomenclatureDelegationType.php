<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureDelegationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codedele','text',array('label' => 'Code','translation_domain' => 'SiseCoreBundle'))
            ->add('libedelear','text',array('label' => 'Libear','translation_domain' => 'SiseCoreBundle'))
            ->add('libedelefr','text',array('label' => 'Libefr','translation_domain' => 'SiseCoreBundle'))
            ->add('ordraffi','integer',array('label' => 'ordraffi','translation_domain' => 'SiseCoreBundle'))
            ->add('acti','checkbox',array('label' => 'acti','translation_domain' => 'SiseCoreBundle'))
            ->add('codecircregi', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'label' => 'codegouv',
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation'
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
