<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureQuestionnaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libequesfr')
            ->add('libequesar')
            ->add('nameclass')
            ->add('spBrowse')
            ->add('spInsert')
            ->add('spEdit')
            ->add('spInit')
            ->add('ordrexec')
            ->add('codepack')
            ->add('prep')
            ->add('prim')
            ->add('collgene')
            ->add('lyce')
            ->add('colltech')
            ->add('codeenti')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_nomenclaturequestionnaire';
    }
}
