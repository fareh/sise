<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureCirconscriptionregionalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codecircregi','text',array('label' => 'Code','translation_domain' => 'SiseCoreBundle'))
            ->add('libecircregiar','text',array('label' => 'Libear','translation_domain' => 'SiseCoreBundle'))
            ->add('libecircregifr','text',array('label' => 'Libefr','translation_domain' => 'SiseCoreBundle'))
            ->add('codegouv', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGouvernorat',
                'property' => 'libegouvar',
                'label' => 'codegouv',
                'translation_domain' => 'SiseCoreBundle',
                'expanded' => false,
                'multiple' => false,
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional'
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
