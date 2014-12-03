<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementResponsableType extends AbstractType
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
            ->add('idenuniqdire')
            ->add('nomprendire')
            ->add('ancidireense')
            ->add('ancidireadmi')
            ->add('telemobidire')
            ->add('maildire')
            ->add('idenuniqdireadjo')
            ->add('nomprendireadjo')
            ->add('ancidireadjoense')
            ->add('ancidireadjoadmi')
            ->add('telemobidireadjo')
            ->add('maildireadjo')
            ->add('codeetab')
            ->add('codegraddire')
            ->add('codegraddireadjo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementResponsable'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_etablissementresponsable';
    }
}
