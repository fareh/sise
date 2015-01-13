<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class SecuriteProfilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeprof')
            ->add('libeproffr')
            ->add('libeprofar')
            ->add('obse')
            ->add('codegrouutil')
            ->add('codeprof_codecyclense')
          /*  ->add('droitaccesgroupe', null, array(
                    "multiple" => true,
                    "expanded" => true
                )
            )*/

          //->add('droitaccesgroupe', 'collection', array('type' => new SecuriteDroitaccesgroupeType()))
           /*->add('droitaccesgroupe', null, array(
                "multiple" => true,
                "expanded" => true,
                'class' => 'SiseCoreBundle:SecuriteDroitaccesgroupe',

                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->leftJoin('p.codeenti', 'c')
                        ->leftJoin('c.codepack', 'r')
                        ->orderBy('r.ordeaffi', 'ASC')
                         ->where('r.ordeaffi >= :ordeaffi')
                        ->setParameter('ordeaffi', 0);
                   // return $er->getDroitAccesGroupe();
                    //var_dump($er->getDroitAccesGroupe()) ; die;
                },
            ))*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\SecuriteProfil'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'securite';
    }
}
