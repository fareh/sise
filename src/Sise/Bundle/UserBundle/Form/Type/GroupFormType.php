<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 08/12/2014
 * Time: 13:43
 */

namespace Sise\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Sise\Bundle\UserBundle\Form\DataTransformer\StringToArrayTransformer;

class GroupFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $transformer = new StringToArrayTransformer();
        $builder->add('name');

        $builder->add($builder->create('roles', 'choice', array(
            'label' => 'I am:',
            'mapped' => true,
            'expanded' => true,
            'multiple' => false,
            'choices' => array(
                'ROLE_NORMAL' => 'Standard',
                'ROLE_VIP' => 'VIP',
            )
        ))->addModelTransformer($transformer));;

    }

    public function getParent()
    {
        return 'fos_user_group';
    }

    public function getName()
    {
        return 'sise_user_group';
    }
}