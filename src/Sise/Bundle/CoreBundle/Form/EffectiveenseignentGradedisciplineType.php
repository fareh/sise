<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentGradedisciplineType extends AbstractType
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
            ->add('nombensetunimasc')
            ->add('nombensetunifemi')
            ->add('nombenseetramasc')
            ->add('nombenseetrafemi')
            ->add('nombtotaense')
            ->add('codedisci')
            ->add('codegrad')
            ->add('coderece')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentGradediscipline'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_effectiveenseignentgradediscipline';
    }
}
