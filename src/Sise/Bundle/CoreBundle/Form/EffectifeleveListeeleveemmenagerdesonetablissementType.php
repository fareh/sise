<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectifeleveListeeleveemmenagerdesonetablissementType extends AbstractType
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
            ->add('nomprenelev')
            ->add('codenivescol')
            ->add('codeetabautr')
            ->add('codefili')
            ->add('codegenr')
            ->add('codetypeetabautr');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectifeleveListeeleveemmenagerdesonetablissement'
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
