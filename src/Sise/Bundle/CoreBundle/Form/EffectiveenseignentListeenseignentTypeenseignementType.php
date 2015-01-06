<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentListeenseignentTypeenseignementType extends AbstractType
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
            ->add('idenuniqense')
            ->add('nompren')
            ->add('enseangl')
            ->add('ensetechinfo');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeenseignentTypeenseignement'
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
