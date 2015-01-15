<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SecuriteGroupeutilisateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libegrouutilfr', null , array(
                'translation_domain' => 'SiseCoreBundle'
            ))
            ->add('libegrouutilar', null , array(
                'translation_domain' => 'SiseCoreBundle'
            ))
            ->add('obse', null , array(
                'translation_domain' => 'SiseCoreBundle'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur'
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
