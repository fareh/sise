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
            ->add('codecircregi')
            ->add('libecircregiar')
            ->add('libecircregifr')
            ->add('codegouv', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGouvernorat',
                'property' => 'libegouvar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
            ->add('ordraffi')
            ->add('acti')
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
