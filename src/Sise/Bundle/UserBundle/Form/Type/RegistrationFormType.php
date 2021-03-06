<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 04/12/2014
 * Time: 17:13
 */

namespace Sise\Bundle\UserBundle\Form\Type;


use Sise\Bundle\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\DataEvent;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sise\Bundle\UserBundle\EventListener\AddfieldToDisabledInEditViewSubscriber;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();
        // add your custom field
        $builder
            ->add('username', null, array(
                'label' => 'الرمز المستخدم',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'الرمز المستخدم',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('email', 'email', array(
                'label' => 'البريد الإلكتروني',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'البريد الإلكتروني',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'كلمة المرور',
                    'attr' => array(
                        'placeholder' => 'كلمة المرور',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )),
                'second_options' => array('label' => 'تأكيد كلمة المرور',
                    'attr' => array(
                        'placeholder' => 'تأكيد كلمة المرور',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    )),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('matr', null, array(
                'label' => 'المعرف الوحيد',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'المعرف الوحيد',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('nomprenutil', null, array(
                'label' => 'الاسم و اللقب',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'الاسم و اللقب',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('codegrouutil', 'entity', array(
                'label' => 'مجموعة المستخدمين',
                'class' => 'SiseCoreBundle:SecuriteGroupeutilisateur',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'مجموعة المستخدمين',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('codeprof', null, array(
                'label' => 'صلاحيات',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'صلاحيات',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('codenivehier', null, array(
                'label' => 'المستوى الإداري',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'المستوى الإداري',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->addEventSubscriber(new AddfieldToDisabledInEditViewSubscriber())
            ;

    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'sise_user_registration';
    }
} 