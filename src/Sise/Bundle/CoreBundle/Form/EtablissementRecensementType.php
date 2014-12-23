<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;

class EtablissementRecensementType extends AbstractType
{

    private $codeetab ;
    private $codetypeetab ;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    public function __construct($codeetab, $codetypeetab,  EntityManager $entityManager)
    {
        $this->codeetab = $codeetab;
        $this->em= $entityManager;
        $this->codetypeetab = $codetypeetab;

    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
             $builder->add('lieuhabitation', 'collection', array(
                 'type' => new EffectiveeleveRepartioneleveLieuhabitationType($this->codeetab, $this->codetypeetab, $this->em),
                 'allow_add' => true,
                 'by_reference' => false,
                 'allow_delete' => true,

                 )

             )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementRecensement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_etablissementrecensement';
    }
}
