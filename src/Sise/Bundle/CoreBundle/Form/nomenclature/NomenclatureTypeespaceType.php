<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureTypeespaceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codetypeespa')
            ->add('libetypeespaar')
            ->add('libetypeespafr')
            ->add('ordraffi')
            ->add('acti')
            ->add('codecateespa','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieespace',
                'property' => 'libecateespaar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
            ->add('prep')
            ->add('prim')
            ->add('collgene')
            ->add('lyce')
            ->add('colltech')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nomenclature_sise';
    }
}
