<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 13/01/2015
 * Time: 14:28
 */

namespace Sise\Bundle\UserBundle\Form\Factory;

use Symfony\Component\Form\FormFactoryInterface;
use FOS\UserBundle\Form\Factory\FactoryInterface;

class FormFactory implements FactoryInterface
{
    private $formFactory;
    private $name;
    private $type;
    private $validationGroups;
    private $user;

    public function __construct(FormFactoryInterface $formFactory, $name, $type, array $validationGroups = null)
    {
        $this->formFactory      = $formFactory;
        $this->name             = $name;
        $this->type             = $type;
        $this->validationGroups = $validationGroups;
    }

    public function createForm()
    {
        return $this->formFactory->createNamed($this->name, $this->type, null, array('validation_groups' => $this->validationGroups));
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
}