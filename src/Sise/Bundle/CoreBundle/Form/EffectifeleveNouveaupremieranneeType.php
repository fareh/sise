<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sise\Bundle\CoreBundle\EventListener\AddfieldToDisabledInEditViewSubscriber;

class EffectifeleveNouveaupremieranneeType extends AbstractType
{

    private $keyVal;


    public function __construct($keyVal=null)
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
            ->add('circonscriptionregional', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'empty_value' => "-- اختيار --"
            ))
            ->add('delegation', 'choice', array(
                'empty_value' => "-- اختيار --"
            ))
            ->addEventSubscriber(new AddfieldToDisabledInEditViewSubscriber())
            ->add('nombelevmasc')
            ->add('nombelevfemi')
            ->add('nombtotaelev')


        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectifeleveNouveaupremierannee'
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
