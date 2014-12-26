<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MouvementeleveListeelevessepareavantconseilclasseType extends AbstractType
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
            ->add('nomprenelev')
            ->add('datesepa')
            ->add('codenivescol')
            ->add('numeleve')
            ->add('coderece')
            ->add('codefili')
            ->add('codegenr')
            ->add('codetypesepa');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\CoreBundle\Entity\MouvementeleveListeelevessepareavantconseilclasse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_Corebundle_mouvementelevelisteelevessepareavantconseilclasse';
    }
}
