<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureLangueenseignementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codelangense')
            ->add('libelangensear')
            ->add('libelangensefr')
            ->add('ordraffi')
            ->add('acti')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureLangueenseignement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_nomenclaturelangueenseignement';
    }
}
