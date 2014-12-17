<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentGradeheuretravailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annescol')
            ->add('nombensemasc')
            ->add('nombensefemi')
            ->add('nombtotaense')
            ->add('codeetab')
            ->add('codegrad')
            ->add('codeheurense')
            ->add('coderece')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentGradeheuretravail'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_effectiveenseignentgradeheuretravail';
    }
}
