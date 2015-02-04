<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 02/01/2015
 * Time: 11:59
 */

namespace Sise\Bundle\UserBundle\EventListener;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AddfieldToDisabledInEditViewSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        // check if the object is "new"
        // If you didn't pass any data to the form, the data is "null".
        // This should be considered a new object
        if (!$data) {
            $form
                ->add('codecircregi', 'entity', array(
                    'label' => 'المندوبية الجهوية ',
                    'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                    'property' => 'libecircregiar',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'لمندوبية الجهوية ',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )))
                ->add('codedele', 'entity', array(
                    'label' => 'المعتمدية',
                    'class' => 'SiseCoreBundle:NomenclatureDelegation',
                    'property' => 'libedelear',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'المعتمدية',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )))
                ->add('codetypeetab', 'entity', array(
                    'label' => 'نوع المؤسسة',
                    'class' => 'SiseCoreBundle:NomenclatureTypeetablissement',
                    'property' => 'libetypeetabar',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'نوع المؤسسة',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )))
                ->add('codeetab', 'entity', array(
                    'label' => 'المؤسسة',
                    'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                    'property' => 'libeetabar',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'المؤسسة',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )));
        } else {
            $codecircregi = $data->getCodecircregi();
            $etab = array('codedele' => $data->getCodedele(), 'codetypeetab' => $data->getCodetypeetab());
            $form
                ->add('codecircregi', 'entity', array(
                    'label' => 'المندوبية الجهوية ',
                    'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                    'property' => 'libecircregiar',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'لمندوبية الجهوية ',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )))
                ->add('codedele', 'entity', array(
                    'label' => 'المعتمدية',
                    'class' => 'SiseCoreBundle:NomenclatureDelegation',
                    'query_builder' => function (EntityRepository $er) use ($codecircregi) {
                        return $er->createQueryBuilder('c')
                            ->where('c.codecircregi = :codecircregi')
                            ->setParameter('codecircregi', $codecircregi);
                    },
                    'property' => 'libedelear',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'المعتمدية',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )))
                ->add('codetypeetab', 'entity', array(
                    'label' => 'نوع المؤسسة',
                    'class' => 'SiseCoreBundle:NomenclatureTypeetablissement',
                    'property' => 'libetypeetabar',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'نوع المؤسسة',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )))
                ->add('codeetab', 'entity', array(
                    'label' => 'المؤسسة',
                    'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                    'query_builder' => function (EntityRepository $er) use ($etab) {
                        $res = $er->createQueryBuilder('c')
                            ->where('c.codetypeetab = :codetypeetab')
                            ->andWhere('c.codedele = :codedele')
                            ->setParameter('codetypeetab', $etab['codetypeetab'])
                            ->setParameter('codedele', $etab['codedele'])
                            ->orderBy('c.codeetab', 'DESC');
                        return $res;
                    },
                    'property' => 'libeetabar',
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'placeholder' => 'المؤسسة',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )));
        }
    }
}