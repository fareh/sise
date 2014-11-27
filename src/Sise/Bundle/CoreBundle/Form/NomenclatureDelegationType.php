<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureDelegationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libedelear')
//            ->add('libedelefr')
//            ->add('ordraffi')
//            ->add('acti')
//            ->add('prep')
//            ->add('prim')
//            ->add('collgene')
//            ->add('lyce')
//            ->add('colltech')
            ->add('codegouv','entity', array(
        'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGouvernorat',
        'property' => 'libegouvar',
        'expanded' => false,
        'multiple' => false,
        'required' => true
    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_Corebundle_nomenclaturedelegation';
    }
}
