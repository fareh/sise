<?php

namespace Sise\SiseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentListeenseignentheureautreetablissementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeetab')
            ->add('codetypeetab')
            ->add('annescol')
            ->add('codeetabautr')
            ->add('codetypeetabautr')
            ->add('annescolautr')
            ->add('numeense')
            ->add('nompren')
            ->add('idenuniqense')
            ->add('nombheur')
            ->add('coderece')
            ->add('codegrad')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\SiseBundle\Entity\EffectiveenseignentListeenseignentheureautreetablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_sisebundle_effectiveenseignentlisteenseignentheureautreetablissement';
    }
}
