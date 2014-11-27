<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureEtablissementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeetab')
            ->add('codetypeetab', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement',
                'property' => 'libetypeetabar',
                'expanded' => false,
                'multiple' => false,
                'required' => true
            ))
            ->add('libeetabar')
            ->add('libeetabfr')
            ->add('libecourar')
            ->add('libecourfr')
            ->add('sect')
            ->add('datecons','datetime')
            ->add('datecrea','datetime')
            ->add('datecreabd','datetime')
            ->add('codezone')
            ->add('codecirc')
            ->add('codecircregi')
         //   ->add("gouv", "choice", array("class" => "SiseCoreBundle:NomenclatureGouvernorat", "property" => "libegouvar"))
            ->add('codedele', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation',
                'property' => 'libedelear',
                'expanded' => false,
                'multiple' => false,
                'required' => true
            ))
            ->add('codesect')
            ->add('codecyclense', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
                'property' => 'libecyclensear',
                'expanded' => true,
                'multiple' => true,
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_nomenclatureetablissement';
    }
}
