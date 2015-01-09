<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentListeenseignentEducationtechniqueType extends AbstractType
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
        ->add('nompren')
        ->add('codegenr')
        ->add('codedipl')
        ->add('codespec')
        ->add('gradactu', 'choice', array(
            'choices'=>array('0'=>'Ali', '1'=>'Maha')
        ))
        ->add('codetypetrav')
        ->add('nombheursema')
        ->add('obse');

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeenseignentEducationtechnique'
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
