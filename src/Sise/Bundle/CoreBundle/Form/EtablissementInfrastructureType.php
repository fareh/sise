<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementInfrastructureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annescol')
            ->add('coderece')
            ->add('codesitufonc','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureProprietebatiment',
                'property' => 'libepropbatiar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --",
            ))
            ->add('surftotaterr')
            ->add('surfcons')
            ->add('surfcouv')
            ->add('distroutgoud')
            ->add('distdele')
            ->add('possexteetab')
            ->add('nombsallexte')
            ->add('obse','text')
            ->add('exisconninte')
            ->add('codeetab')
            ->add('codesituelecatel','entity', array(
                  'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSituationreseauelectriqueatelier',
                  'property' => 'libesituelecatelar',
                  'expanded' => false,
                   'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --",
    ))
            ->add('codetypeclot','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypecloture',
                'property' => 'libetypeclotar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --",
            ))
            ->add('codetypeconninte','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeconnxioninternet',
                'property' => 'libetypeconnintear',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --",
            ))
            ->add('codezone','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureZone',
                'property' => 'libezonear',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --",
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementInfrastructure'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_etablissementinfrastructure';
    }
}
