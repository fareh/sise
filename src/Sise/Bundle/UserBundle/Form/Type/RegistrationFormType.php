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
                )))
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