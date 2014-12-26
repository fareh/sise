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
            ->add('etabtravpens', 'choice',
                array('required' => 'false',
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('etabtravdemipens', 'choice',
                array('required' => 'false',
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('fax')
            ->add('mail', 'email', array('required' => false))
            ->add('siteweb')
            ->add('educprio', 'choice',
                array('required' => 'false',
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('etabintehand', 'choice',
                array('required' => 'false',
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('exisanneprep', 'choice',
                array('required' => 'false',
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('exisanneprepintehand', 'choice',
                array('required' => 'false',
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('resp', new EtablissementResponsableType())
            ->add('infr', new EtablissementInfrastructureType())
            ->add('sejo', 'collection', array('type' => new EtablissementSejourType(), 'allow_add' => true,));;
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
