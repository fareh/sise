<?php

namespace Sise\Bundle\CoreBundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrientationFilieresportType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeetab')
            ->add('codetypeetab')
            ->add('annescol')
            ->add('anne')
            ->add('nombelevmasc')
            ->add('nombelevfemi')
            ->add('codefiliorig')
            ->add('coderece')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\OrientationFilieresport'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_orientationfilieresport';
    }
}
