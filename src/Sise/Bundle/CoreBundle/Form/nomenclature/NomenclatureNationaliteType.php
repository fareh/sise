<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureNationaliteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codenati')
            ->add('libenatiar')
            ->add('libenatifr')
            ->add('ordraffi')
            ->add('acti')
            ->add('codecatenati', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCategorienationalite',
                'property' => 'libecatenatiar',
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite'
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
