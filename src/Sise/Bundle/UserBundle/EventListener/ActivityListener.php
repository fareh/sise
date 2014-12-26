<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 22/12/2014
 * Time: 10:14
 */

namespace Sise\Bundle\UserBundle\EventListener;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use DateTime;
use Sise\Bundle\UserBundle\Entity\User;

class ActivityListener
{
    protected $securityContext;
    protected $em;

    public function __construct(SecurityContextInterface $securityContext, EntityManager $entityManager)
    {
        $this->securityContext = $securityContext;
        $this->em = $entityManager;
    }

    /**
     * On each request we want to update the user's last activity datetime
     *
     * @param \Symfony\Component\HttpKernel\Event\FilterControllerEvent $event
     * @return void
     */
    public function onCoreController(FilterControllerEvent $event)
    {
        if ($this->securityContext->getToken()) {
            $user = $this->securityContext->getToken()->getUser();
            if ($user instanceof User) {
                //here we can update the user as necessary
                $user->setLastActivity(new DateTime());

                $this->em->persist($user);
                $this->em->flush($user);
            }
        }
    }

}