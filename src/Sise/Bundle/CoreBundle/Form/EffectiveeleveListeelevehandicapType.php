<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveeleveListeelevehandicapType extends AbstractType
{

    private $keyVal;


    public function __construct($keyVal)
    {
        $this->keyVal = $keyVal;


    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nompren')
            ->add('redo')
            ->add('intefaci')
            ->add('intedefi')
            ->add('suivcentspec')
            ->add('codegenr')
            ->add('annenais')
            ->add('codenivescol')
            ->add('codetypehand')
            ->add('codedegrhand')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveListeelevehandicap'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyVal;
    }
}
