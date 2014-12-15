<?php

namespace Sise\SiseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MouvementeleveRecapmouvmenteleveType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annescol')
            ->add('nombelev16octobre')
            ->add('nombelevvenaautretab')
            ->add('nombelevdeplautretab')
            ->add('nombelevsepa')
            ->add('nombelevexcl')
            ->add('nombelev30juin')
            ->add('nombelevreus')
            ->add('nombelevredo')
            ->add('nombelevexcl30juin')
            ->add('nombtotaelev')
            ->add('codeetab')
            ->add('codefili')
            ->add('codegenr')
            ->add('codenivescol')
            ->add('coderece')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\SiseBundle\Entity\MouvementeleveRecapmouvmenteleve'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_sisebundle_mouvementeleverecapmouvmenteleve';
    }
}
