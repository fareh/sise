<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureParametreexogeneType extends AbstractType
{
    private $tablnamefk;

    function __construct($tablnamefk = null)
    {
        $this->tablnamefk = $tablnamefk;

    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libeparaexogar')
            ->add('libeparaexogfr')
            ->add('choicefk', 'choice', array(
                'choices' => array('NomenclatureCycleenseignement' => 'CyclEnse', 'NomenclatureNiveauscolaire' => 'NiveScol', 'NomenclatureFiliere' => 'Fili'),
                'required' => false,
            ))
        ->add('valeindi');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene'
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
