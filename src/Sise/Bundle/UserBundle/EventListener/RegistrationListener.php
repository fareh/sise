<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 09/01/2015
 * Time: 09:57
 */

namespace Sise\Bundle\UserBundle\EventListener;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationListener implements EventSubscriberInterface{


    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();
        $user->addRole($user->getCodeprof()->getCodeprof());
    }




} 