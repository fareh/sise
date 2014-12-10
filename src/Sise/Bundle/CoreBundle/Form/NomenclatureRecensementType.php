<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureRecensementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('liberecear')
            ->add('liberecefr')
            ->add('annescol')
            ->add('dateouve')
            ->add('dateclot')
            ->add('codeperisuivbudg')
            ->add('initques')
            ->add('obse')
            ->add('codeperi')
            ->add('dureperi')
            ->add('codeetatrece')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureRecensement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_sisebundle_nomenclaturerecensement';
    }
}
