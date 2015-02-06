<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class MouvementeleveListeelevessepareavantconseilclasseType extends AbstractType
{
    private $keyVal;


    public function __construct($keyVal)
    {
        $this->keyVal = $keyVal;


    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomprenelev')
            ->add('codenivescol')
            ->add('codenivescol', null, array(
                'class' => 'SiseCoreBundle:NomenclatureNiveauscolaire',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.codecyclense not IN  (:codecyclense)')
                        ->orderBy('p.ordraffi', 'ASC')
                        ->setParameter('codecyclense', array(0,3));
                },
            ))
            ->add('codefili')
            ->add('codegenr')
            ->add('datesepa')
            ->add('codetypesepa');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\MouvementeleveListeelevessepareavantconseilclasse'

        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyVal;
    }
}
