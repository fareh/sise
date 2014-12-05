<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 04/12/2014
 * Time: 17:13
 */

namespace Sise\Bundle\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
            ->add('givenName', null, array(
                'label' => 'الاسم',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'الاسم',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('familyName', null, array(
                'label' => 'اللقب',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'اللقب',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))


            ->add('phoneNumber', null, array(
                'label' => 'رقم الهاتف',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'رقم الهاتف',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))


            ->add('mobileNumber', null, array(
                'label' => 'رقم الهاتف المحمول',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'placeholder' => 'رقم الهاتف المحمول',
                ),
                'label_attr' => array(
                    'class' => 'sr-only',
                )))
            ->add('roles', 'collection',
                array('label' => 'صلاحيات',
                    'attr' => array(
                        'placeholder' => 'رقم الهاتف المحمول',
                    ),
                    'label_attr' => array(
                        'class' => 'sr-only',
                    ),
                    'type' => 'choice', 'options' =>
                    array( 'choices' => array('ROLE_USER' => 'user', 'ROLE_ADMIN' => 'admin') ) ))

            ->add('group', 'entity', array(
                'class' => 'SiseUserBundle:Group',
                'property' => 'name'
            ))


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