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
            ->add('redo', 'choice', array(
                'choices'   => array(0 => 'Nouveau', 1 => 'Redoublant'),
                'required'  => false,
            ))

            ->add('intefaci', 'choice', array(
                'choices'   => array(0 => 'Facile', 1 => 'Difficile'),
                'required'  => false,
            ))
            ->add('intedefi')
            ->add('suivcentspec', 'choice', array(
                'choices'   => array(0 => 'Non', 1 => 'Oui'),
                'required'  => false,
            ))
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
