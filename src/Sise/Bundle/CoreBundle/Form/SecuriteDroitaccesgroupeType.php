<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SecuriteDroitaccesgroupeType extends AbstractType
{
    private $keyValue;
    function __construct($keyValue)
    {
      $this->keyValue=$keyValue;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('droisele')
            ->add('droiinse')
            ->add('droiupda')
            ->add('droidele')
            //->add('codeprof')
           // ->add('codeenti')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyValue;
    }
}
