<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureIndicateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libeindiar')
            ->add('libeindifr')
            ->add('ordraffi')
            ->add('acti')
            ->add('definition')
            ->add('spindicateur')
          ->add('codeparaindi', 'collection', array('type' => new NomenclatureParametrespindicateurType()))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureIndicateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_nomenclatureindicateur';
    }
}
