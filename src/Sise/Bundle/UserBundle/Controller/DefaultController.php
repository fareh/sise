<?php

namespace Sise\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;
use Sise\Bundle\UserBundle\Form\Type\RegistrationFormType;
use Sise\Bundle\UserBundle\Form\Type\relatedItemsFormType;
use Sise\Bundle\UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        return $this->render('SiseUserBundle:Default:index.html.twig', array('name' => $name));
    }


    //get all users
    public function usersAction()
    {
        //access user manager services
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('SiseUserBundle:Default:users.html.twig', array('users' => $users));
    }


    /**
     * @Route( "/post/new", name="pre_set_post" )
     * @Template()
     */
    public function createAction(Request $request)
    {
        $postform = $this->createForm(new RegistrationFormType());
        if ($request->isMethod('POST')) {
            $postform->bind($request);
        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'form' => $postform->createView(),
        ));
    }


    public function itemAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $valinput = '';
            $typeinput = '';
            $valinput = $request->get('$valinput');
            $typeinput = $request->get('$typeinput');
            $displayinput = 'codeprof';
            if ($valinput != '' and $typeinput != '') {
                if($typeinput=='codegrouutil'){

                    $form = $this->createForm(new relatedItemsFormType(), new User(), array())
                   /* $form = $this->createFormBuilder(new User(), array(
                        'attr' => array('name' => 'search'),
                    ))*/

                        ->add('codeprof', 'entity', array(
                            'class' => 'SiseCoreBundle:SecuriteProfil',
                            'query_builder' => function(EntityRepository $er )use ($valinput){
                                return $er->createQueryBuilder('c')
                                    ->where('c.codegrouutil = :codegrouutil')
                                    ->setParameter('codegrouutil', $valinput);
                            },
                            'label' => 'صلاحيات',
                            'translation_domain' => 'FOSUserBundle',
                            'attr' => array(
                                'placeholder' => 'صلاحيات',
                                'name'=>'search'
                            ),
                            'label_attr' => array(
                                'class' => 'sr-only',
                            )))
                   ->createView();
                    $displayinput = 'codeprof';

                }


                if($typeinput=='codeprof'){
                    /*$form = $this->createFormBuilder(new User())*/
                          $form = $this->createForm(new relatedItemsFormType(), new User(), array())
                        ->add('codenivehier', null, array(
                            'label' => 'المستوى الإداري',
                            'translation_domain' => 'FOSUserBundle',
                            'attr' => array(
                                'placeholder' => 'المستوى الإداري',
                            ),
                            'label_attr' => array(
                                'class' => 'sr-only',
                            )))
                       ->createView();
                    $displayinput = 'codenivehier';

                }


                if($typeinput=='codenivehier'){
                   /* $form = $this->createFormBuilder(new User())*/
                          $form = $this->createForm(new relatedItemsFormType(), new User(), array())
                        ->add('codecircregi', 'entity', array(
                            'label' => 'المندوبية الجهوية ',
                            'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                            'property' => 'libecircregiar',
                            'translation_domain' => 'FOSUserBundle',
                            'attr' => array(
                                'placeholder' => 'لمندوبية الجهوية ',
                            ),
                            'label_attr' => array(
                                'class' => 'sr-only',
                            )))
                        ->createView();
                    $displayinput = 'codecircregi';
                }


                if($typeinput=='codecircregi'){
                   /* $form = $this->createFormBuilder(new User())*/
                          $form = $this->createForm(new relatedItemsFormType(), new User(), array())
                        ->add('codedele', 'entity', array(
                            'label' => 'المعتمدية',
                            'class' => 'SiseCoreBundle:NomenclatureDelegation',
                            'query_builder' => function(EntityRepository $er )use ($valinput){
                                return $er->createQueryBuilder('c')
                                    ->where('c.codecircregi = :codecircregi')
                                    ->setParameter('codecircregi', $valinput);
                            },
                            'property' => 'libedelear',
                            'translation_domain' => 'FOSUserBundle',
                            'attr' => array(
                                'placeholder' => 'المعتمدية',
                            ),
                            'label_attr' => array(
                                'class' => 'sr-only',
                            )))
                       ->createView();
                    $displayinput = 'codedele';

                }


                if($typeinput=='codedele'){
                    $form = $this->createForm(new relatedItemsFormType(), new User(), array())
                   /* $form = $this->createFormBuilder(new User())*/
                        ->add('codetypeetab', 'entity', array(
                            'label' => 'نوع المؤسسة',
                            'class' => 'SiseCoreBundle:NomenclatureTypeetablissement',
                            'property' => 'libetypeetabar',
                            'translation_domain' => 'FOSUserBundle',
                            'attr' => array(
                                'placeholder' => 'نوع المؤسسة',
                            ),
                            'label_attr' => array(
                                'class' => 'sr-only',
                            )))
                        ->createView();
                    $displayinput = 'codetypeetab';

                }



                if($typeinput=='codetypeetab'){
                    $valinput2 = $request->get('$valinput2');
                    $value = array('valinput'=>$valinput, 'valinput2'=>$valinput2);
                   /* $form = $this->createFormBuilder(new User())*/
                    $form = $this->createForm(new relatedItemsFormType(), new User(), array())
                        ->add('codeetab', 'entity', array(
                            'label' => 'المؤسسة',
                            'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                            'query_builder' => function(EntityRepository $er )use ($value){
                                return $er->createQueryBuilder('c')
                                    ->where('c.codetypeetab = :codetypeetab')
                                    ->andWhere('c.codedele = :codedele')
                                    ->setParameter('codetypeetab', $value['valinput'])
                                    ->setParameter('codedele', $value['valinput2']);
                            },
                            'property' => 'libeetabar',
                            'translation_domain' => 'FOSUserBundle',
                            'attr' => array(
                                'placeholder' => 'المؤسسة',
                            ),
                            'label_attr' => array(
                                'class' => 'sr-only',
                            )))
                       ->createView();
                    $displayinput = 'codeetab';
                }



                //$form_assign = $form->createNamedBuilder('fos_user_registration', 'form', $form, array())

                return $this->render('SiseUserBundle:Default:prototype_user.html.twig', array(
                    'form' => @$form,
                    'displayinput'=>$displayinput
                ));


            } else {
                return new Response("Ereeur");
            }

        }

        return new Response("Ereeur");
    }


}
