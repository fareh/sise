<?php

namespace Sise\Bundle\CoreBundle\Form\nomenclature;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureNiveauscolaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codenivescol')
            ->add('libenivescolar')
            ->add('libenivescolfr')
            ->add('codecyclense', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
                'property' => 'libecyclensear',
                'expanded' => false,
                'multiple' => true,
                'required' => true,
            ))
            ->add('codenivescolsuiv', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire',
                'property' => 'libenivescolar',
                'expanded' => false,
                'multiple' => true,
                'required' => true,
            ))
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
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire'
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
