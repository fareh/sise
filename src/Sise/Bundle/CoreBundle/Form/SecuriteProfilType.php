<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SecuriteProfilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeprof')
            ->add('libeproffr')
            ->add('libeprofar')
            ->add('obse')
            ->add('codegrouutil')
            ->add('codeprof_codecyclense')
            ->add('droitaccesgroupe', null, array(
                    "multiple" => true,
                    "expanded" => true
                )
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\SecuriteProfil'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'securite';
    }
}
