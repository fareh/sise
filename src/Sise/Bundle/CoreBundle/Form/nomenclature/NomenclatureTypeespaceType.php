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
            ->add('codetypeespa','text',array('label' => 'Code','translation_domain' => 'SiseCoreBundle'))
            ->add('libetypeespaar','text',array('label' => 'Libear','translation_domain' => 'SiseCoreBundle'))
            ->add('libetypeespafr','text',array('label' => 'Libefr','translation_domain' => 'SiseCoreBundle'))
            ->add('ordraffi','integer',array('label' => 'ordraffi','translation_domain' => 'SiseCoreBundle'))
            ->add('acti','checkbox',array('label' => 'acti','translation_domain' => 'SiseCoreBundle'))
            ->add('codecateespa','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieespace',
                'property' => 'libecateespaar',
                'label' => 'codecateespa',
                'translation_domain' => 'SiseCoreBundle',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
            ->add('prep','checkbox',array('label' => 'prep','translation_domain' => 'SiseCoreBundle'))
            ->add('prim','checkbox',array('label' => 'prim','translation_domain' => 'SiseCoreBundle'))
            ->add('collgene','checkbox',array('label' => 'collgene','translation_domain' => 'SiseCoreBundle'))
            ->add('lyce','checkbox',array('label' => 'lyce','translation_domain' => 'SiseCoreBundle'))
            ->add('colltech','checkbox',array('label' => 'colltech','translation_domain' => 'SiseCoreBundle'))
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
