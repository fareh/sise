<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/01/2015
 * Time: 08:59
 */

namespace Sise\Bundle\CoreBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AccessListener
{

    private $security;
    private $router;

    public function __construct($security, $router)
    {
        $this->security = $security;
        $this->router = $router;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {


        if ($event->isMasterRequest()) {

            $loginRoute = 'fos_user_security_login';

            $request = $event->getRequest();

            // Return if current route and login route match
           if ($request->get('_route') === $loginRoute) {
                return  ;
            }
            $user = $this->security->getToken()->getUser();
            if (is_object($user)) {
                return  ;
            } else {
                $url = $this->router->generate($loginRoute);
                $event->setResponse(new RedirectResponse($url));

            }

        }
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {



    }
}