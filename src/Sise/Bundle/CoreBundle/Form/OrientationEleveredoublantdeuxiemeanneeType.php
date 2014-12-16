<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrientationEleveredoublantdeuxiemeanneeType extends AbstractType
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
            ->add('nombelevmasc')
            ->add('nombelevfemi')
            ->add('codefilireorie')
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\OrientationEleveredoublantdeuxiemeannee'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_orientationeleveredoublantdeuxiemeannee';
    }
}
