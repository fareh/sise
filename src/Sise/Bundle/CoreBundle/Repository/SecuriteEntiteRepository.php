<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 25/12/2014
 * Time: 11:36
 */

namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

class SecuriteEntiteRepository extends EntityRepository
{

    public function getEntities()
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.codepack', 'r')
            ->orderBy('r.ordeaffi', 'ASC')
            ->getQuery()->getResult();
    }


}