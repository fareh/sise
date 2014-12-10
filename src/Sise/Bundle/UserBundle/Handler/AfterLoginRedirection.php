<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/12/2014
 * Time: 15:24
 */

namespace Sise\Bundle\UserBundle\Handler;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;
    private $em;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router, EntityManager $entityManager)
    {
        $this->router = $router;
        $this->em = $entityManager;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $session = $request->getSession();
        /*   $query = $this->em->createQuery(
               'Select R
           from  SiseCoreBundle:NomenclatureRecensement  R
           Where  R.dateclot >= :GetDate  and R.dateouve <= :GetDate'
           )
               ->setParameter('GetDate', new \datetime('now'))
               ->setMaxResults(1);*/

        $query = $this->em->createQuery('Select R from  SiseCoreBundle:NomenclatureRecensement  R ')->setMaxResults(1);
        $items = $query->getResult();
        foreach ($items as $item) {
            $session->set("CodeRece", $item->getCoderece());
            $session->set("AnneScol", $item->getAnnescol());
            $session->set("LibeReceAr", $item->getLiberecear());
        }
        // On récupère la liste des rôles d'un utilisateur
        $roles = $token->getRoles();
        // On transforme le tableau d'instance en tableau simple
        $rolesTab = array_map(function ($role) {
            return $role->getRole();
        }, $roles);
        // S'il s'agit d'un admin ou d'un super admin on le redirige vers le backoffice
        if (in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('sise_core_homepage'));
        // sinon, s'il s'agit d'un commercial on le redirige vers le CRM
        elseif (in_array('ROLE_COMMERCIAL', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('sise_core_homepage'));
        // sinon il s'agit d'un membre
        else
            $redirection = new RedirectResponse($this->router->generate('sise_core_homepage'));

        return $redirection;
    }
}