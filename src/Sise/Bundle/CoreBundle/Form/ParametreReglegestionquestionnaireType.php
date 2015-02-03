<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ParametreReglegestionquestionnaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeques')
            ->add('acti')
            ->add('valeurmin')
            ->add('valeurmax')
            ->add('sqlcomparaison')
            ->add('messageerreur')
            ->add('messageerreurfr')
            ->add('descregl')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\ParametreReglegestionquestionnaire'
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
