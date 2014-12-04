<?php

namespace Sise\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SiseUserBundle:Default:index.html.twig', array('name' => $name));
    }



    //get all users
    public function usersAction() {
        //access user manager services
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('SiseUserBundle:Default:users.html.twig', array('users' =>   $users));
    }

}
