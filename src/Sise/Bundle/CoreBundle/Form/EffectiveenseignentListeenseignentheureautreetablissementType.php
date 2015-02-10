<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 06/01/2015
 * Time: 15:02
 */

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class EffectiveenseignentListeenseignentheureautreetablissementType  extends AbstractType
{
    private $session;
    private $features;
    /** @var \Doctrine\ORM\EntityManager */
    private $keyval ;
    private $codecircregi="";

    function __construct($keyval, $session){

        $this->keyval =$keyval;
        $this->session = $session;
        if ($this->session != null and $this->session->has('features')) {
            $this->features = $this->session->get('features');
            if($this->features['NomenclatureCirconscriptionregional']){
                $this->codecircregi=$this->features['NomenclatureCirconscriptionregional'];
            }
        } else {
            $this->features = array();
        }
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $codecircregi = $this->codecircregi;
        $builder
            ->add('nompren')
            ->add('idenuniqense')
            ->add('codegrad')
            ->add('codedele', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureDelegation',
                'query_builder' => function(EntityRepository $er)use($codecircregi) {
                    if($codecircregi){
                        return $er->createQueryBuilder('p')
                            ->where('p.codecircregi = :codecircregi')
                            ->orderBy('p.codedele', 'ASC')
                            ->setParameter('codecircregi', $codecircregi);
                    }else{
                        return $er->createQueryBuilder('p');
                    }
                },
                'property' => 'libedelear',
                'empty_value' => "-- اختيار --"
            ))
           /* ->add('codenivescol', null, array(
                'class' => 'SiseCoreBundle:NomenclatureNiveauscolaire',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.codecyclense not IN  (:codecyclense)')
                        ->orderBy('p.ordraffi', 'ASC')
                        ->setParameter('codecyclense', array(0,3));
                },
            ))*/


           ->add('codetypeetabautr', null, array(
               'class' => 'SiseCoreBundle:NomenclatureTypeetablissement',
               'query_builder' => function(EntityRepository $er) {
                   return $er->createQueryBuilder('p')
                       ->where('p.codetypeetab not IN  (:codetypeetab)')
                       ->orderBy('p.codetypeetab', 'ASC')
                       ->setParameter('codetypeetab', array(00,2040,50,60,70,75));
               }))


           /* ->add('codetypeetabautr')


            ->add('codeetabautr')*/
          /*  ->add('codeetabautr', 'choice', array(
                  'empty_value' => "-- اختيار --",
              ))


            ->add('codeetabautr', null, array(
                'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.codeetab =  :codeetab')
                        ->andWhere('p.codetypeetab =  :codetypeetab')
                        ->orderBy('p.codeetab', 'ASC')
                        ->setParameter('codeetab', 0)
                        ->setParameter('codetypeetab', 0);
                }))
        */


                        ->addEventListener(
                            FormEvents::PRE_SET_DATA,
                            function (FormEvent $event) {
                                $form = $event->getForm();
                                $data = $event->getData();
                                if ($data and $data->getCodeetabautr() and $data->getCodetypeetabautr() ) {
                                    $codeetab = $data->getCodeetabautr()->getCodeetab();
                                    $codeetype = $data->getCodetypeetabautr()->getCodetypeetab();
                                    $form->add('codeetabautr', null, array(
                                        'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                                        'query_builder' => function(EntityRepository $er)use($codeetab, $codeetype) {
                                            return $er->createQueryBuilder('p')
                                                ->where('p.codeetab =  :codeetab')
                                                ->andWhere('p.codetypeetab =  :codetypeetab')
                                                ->orderBy('p.codeetab', 'ASC')
                                                ->setParameter('codeetab', $codeetab)
                                                ->setParameter('codetypeetab', $codeetype);
                                        }));

                                } else {
                                    $form->add('codeetabautr', null, array(
                                        'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                                        'query_builder' => function(EntityRepository $er) {
                                            return $er->createQueryBuilder('p')
                                                ->where('p.codeetab =  :codeetab')
                                                ->andWhere('p.codetypeetab =  :codetypeetab')
                                                ->orderBy('p.codeetab', 'ASC')
                                                ->setParameter('codeetab', 0)
                                                ->setParameter('codetypeetab', 0);
                                        }));
                                }
                            }
                        );
                   $builder ->add('nombheur');


        /* ->add('annescolautr')*/





    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeenseignentheureautreetablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyval;
    }
}
