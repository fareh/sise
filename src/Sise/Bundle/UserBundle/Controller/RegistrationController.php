<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/12/2014
 * Time: 17:12
 */

namespace Sise\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class RegistrationController extends BaseController
{

    /**
     * @Security("has_role('A')")
     */


    public function registerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        if ($request->isMethod('POST')) {
            $form->setData($user);
            $form->handleRequest($request);
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
            $params = $request->request->get($form->getName());
            if($params["codedele"]){
                $del = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->find($params["codedele"]);
                if($del){
                    $user->setCodedele($del);
                }
            }
            if($params["codetypeetab"]){
                $typeetab = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->find($params["codetypeetab"]);
                if($typeetab){
                    $user->setCodetypeetab($typeetab);
                }
            }
            if($params["codeetab"]){
                $etab = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codeetab'=>$params["codeetab"], 'codetypeetab'=>$typeetab));
                if($typeetab and $etab){
                    $user->setCodeetab($etab);
                }
            }
            if ($form->isValid()) {
                $userManager->updateUser($user);
                if (null === $response = $event->getResponse()) {
                    //  $url = $this->generateUrl('fos_user_registration_confirmed');
                    $url = $this->generateUrl('sise_user_list');
                    $response = new RedirectResponse($url);
                }
                // $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));
                return $response;

            }
        }
        return $this->render('FOSUserBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Security("has_role('A')")
     */

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('SiseUserBundle:User')->find($id);
        if (!$user) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');
        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);
        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
       // $formFactory = $this->get('sise_user.profile.form.factory');
        $formFactory = $this->container->get('sise_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);
        $form->handleRequest($request);
        $params = $request->request->get($form->getName());
        if($params["codedele"]){
            $del = $em->getRepository('SiseCoreBundle:NomenclatureDelegation')->find($params["codedele"]);
            if($del){
                $user->setCodedele($del);
            }
        }
        if($params["codetypeetab"]){
            $typeetab = $em->getRepository('SiseCoreBundle:NomenclatureTypeetablissement')->find($params["codetypeetab"]);
            if($typeetab){
                $user->setCodetypeetab($typeetab);
            }
        }
        if($params["codeetab"]){
            $etab = $em->getRepository('SiseCoreBundle:NomenclatureEtablissement')->findOneBy(array('codeetab'=>$params["codeetab"], 'codetypeetab'=>$typeetab));
            if($typeetab and $etab){
                $user->setCodeetab($etab);
            }
        }
        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);
            $userManager->updateUser($user);
            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('sise_user_list');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }
        return $this->render('FOSUserBundle:Registration:edit.html.twig', array(
            'form' => $form->createView(),
            'user'=>$user
        ));
    }

    /**
     * Tell the user to check his email provider
     */
    public function checkEmailAction()
    {
        $email = $this->get('session')->get('fos_user_send_confirmation_email/email');
        $this->get('session')->remove('fos_user_send_confirmation_email/email');
        $user = $this->get('fos_user.user_manager')->findUserByEmail($email);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with email "%s" does not exist', $email));
        }

        return $this->render('FOSUserBundle:Registration:checkEmail.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Receive the confirmation token from user email provider, login the user
     */
    public function confirmAction(Request $request, $token)
    {
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->findUserByConfirmationToken($token);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
        }

        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user->setConfirmationToken(null);
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRM, $event);

        $userManager->updateUser($user);

        if (null === $response = $event->getResponse()) {
           // $url = $this->generateUrl('fos_user_registration_confirmed');
            $url = $this->generateUrl('sise_user_list');
            $response = new RedirectResponse($url);
        }

        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRMED, new FilterUserResponseEvent($user, $request, $response));

        return $response;
    }

    /**
     * Tell the user his account is now confirmed
     */
    public function confirmedAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('FOSUserBundle:Registration:confirmed.html.twig', array(
            'user' => $user,
        ));
    }
}