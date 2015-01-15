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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Sise\Bundle\UserBundle\EventListener\AddfieldToDisabledInEditViewSubscriber;

class ProfileFormType   extends \FOS\UserBundle\Form\Type\ProfileFormType
{

    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildUserForm($builder, $options);
            $builder->add('current_password', 'password', array(
                'label' => 'form.current_password',
                'translation_domain' => 'FOSUserBundle',
                'mapped' => false,
                'constraints' => new UserPassword(),
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



    public function getName()
    {
        return 'sise_user_profile';
    }





    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'profile',
            'user' => null
        ));
    }


    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
        ;
    }
}