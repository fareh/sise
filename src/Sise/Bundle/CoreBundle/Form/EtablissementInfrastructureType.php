<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementInfrastructureType extends AbstractType
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
            ->add('codesitufonc')
            ->add('surftotaterr')
            ->add('surfcons')
            ->add('surfcouv')
            ->add('distroutgoud')
            ->add('distdele')
            ->add('possexteetab')
            ->add('nombsallexte')
            ->add('obse')
            ->add('exisconninte')
            ->add('codeetab')
            ->add('codesituelecatel')
            ->add('codetypeclot')
            ->add('codetypeconninte')
            ->add('codezone')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementInfrastructure'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_etablissementinfrastructure';
    }
}
