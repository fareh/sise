<?php

namespace Sise\SiseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrientationElevereussideuxiemeanneeType extends AbstractType
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
            ->add('codefiliorig')
            ->add('codefilireorie')
            ->add('coderece')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\SiseBundle\Entity\OrientationElevereussideuxiemeannee'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_sisebundle_orientationelevereussideuxiemeannee';
    }
}
