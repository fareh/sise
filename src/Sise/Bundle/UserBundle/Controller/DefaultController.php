<?php

namespace Sise\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
USE Sise\Bundle\UserBundle\Form\Type\RegistrationFormType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        return $this->render('SiseUserBundle:Default:index.html.twig', array('name' => $name));
    }



    //get all users
    public function usersAction() {
        //access user manager services
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('SiseUserBundle:Default:users.html.twig', array('users' =>   $users));
    }



    /**
     * @Route( "/post/new", name="pre_set_post" )
     * @Template()
     */
    public function createAction( Request $request )
    {
        $postform = $this->createForm(new RegistrationFormType( ) );
        if ( $request->isMethod( 'POST' ) ) {
            $postform->bind( $request );
        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'form' => $postform->createView(),
        ));
    }

}
