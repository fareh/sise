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
            ->add('codeetab','text')
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
            ->add('codecircregi','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'expanded' => false,
                'multiple' => false,
                'required' => true
            ))
            ->add('codedele','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation',
                'property' => 'libedelear',
                'expanded' => false,
                'multiple' => false,
                'required' => true
            ))
            ->add('codesect','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSecteur',
                'property' => 'libesectar',
                 'expanded' => false,
                 'multiple' => false,
                 'required' => true
                  ))
            ->add('sect')
            ->add('codecirc','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscription',
                'property' => 'libecircar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
            ->add('codezone','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureZone',
                'property' => 'libezonear',
                'expanded' => false,
                'multiple' => false,
                'required' => true
            ))
            ->add('datecons','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('datecrea','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
           // ->add('datecreabd','datetime')



         //   ->add("gouv", "choice", array("class" => "SiseCoreBundle:NomenclatureGouvernorat", "property" => "libegouvar"))
//            ->add('codedele', 'entity', array(
//                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation',
//                'property' => 'libedelear',
//                'expanded' => false,
//                'multiple' => false,
//                'required' => true
//            ))

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
