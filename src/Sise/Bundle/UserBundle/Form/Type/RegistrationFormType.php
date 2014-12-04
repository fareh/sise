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
        $builder->add('name');
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