<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentListeremplacementprovisoireType extends AbstractType
{
    private $keyval ;

    function __construct($keyval){

        $this->keyval =$keyval;


    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomprenense')
            ->add('nombheur')
            ->add('codecausrempprov');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeremplacementprovisoire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyval;
    }
}
