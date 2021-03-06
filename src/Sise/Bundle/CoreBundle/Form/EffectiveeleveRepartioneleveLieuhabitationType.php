<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;

class EffectiveeleveRepartioneleveLieuhabitationType extends AbstractType
{
    private $codeetab;
    private $codetypeetab;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;


    private $keyval ;

    public function __construct($codeetab, $codetypeetab, $keyval, EntityManager $entityManager)
    {
        $this->codeetab = $codeetab;
        $this->em = $entityManager;
        $this->codetypeetab = $codetypeetab;
        $this->keyval =$keyval;

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('codedele', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureDelegation',
                'property' => 'libedelear',
                'choices' => $this->getAllCoDedele()
            ))
            ->add('lieu')
            ->add('nombelev')
            ->add('dist')
          ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation'
        ));
    }


    private function getAllCoDedele()
    {

        $children = $this->em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codeetab' => $this->codeetab, 'codetypeetab' => $this->codetypeetab));
        return $children->getCodedele();
    }

    private function getAllDistance()
    {
        $dist = array();
        $distances = $this->em->getRepository('SiseCoreBundle:NomenclatureDistance')->findAll();

        foreach ($distances as $distance) {

            $dist[$distance->getId()] = $distance->getLibedistar();

        }

        return $dist;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyval;
    }
}
