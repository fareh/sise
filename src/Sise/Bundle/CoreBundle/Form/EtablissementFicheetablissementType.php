<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementFicheetablissementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adreetab')
            ->add('codepost')
            ->add('telefixe')
            ->add('fax')
            ->add('mail')
            ->add('siteweb')
            ->add('educprio')
            ->add('etabintehand')
            ->add('exisanneprep')
            ->add('exisanneprepintehand')
            ->add('resp',new EtablissementResponsableType())
            ->add('infr',new EtablissementInfrastructureType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementFicheetablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_etablissementficheetablissement';
    }
}
