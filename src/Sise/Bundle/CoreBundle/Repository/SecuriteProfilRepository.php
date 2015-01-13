<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 25/12/2014
 * Time: 11:36
 */

namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

class SecuriteProfilRepository extends EntityRepository
{

    public function getDroitAccesGroupe()
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.droitaccesgroupe', 'p')
            ->leftJoin('p.codeenti', 'c')
            ->leftJoin('c.codepack', 'r')
            ->orderBy('r.ordeaffi', 'DESC')
            ->groupBy('r.codepack')
            ->getQuery()->getResult();
    }


}