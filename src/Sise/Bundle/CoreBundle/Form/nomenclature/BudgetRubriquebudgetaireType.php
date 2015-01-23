<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BudgetRubriquebudgetaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coderubrbudg')
            ->add('liberubrbudgar')
            ->add('liberubrbudgfr')
            ->add('ordraffi')
            ->add('acti')
            ->add('codetyperubrbudg', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTyperubriquebudgetaire',
                'property' => 'libetyperubrbudgar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\BudgetRubriquebudgetaire'
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
