<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 25/12/2014
 * Time: 11:36
 */

namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

class SecuriteDroitaccesgroupeRepository extends EntityRepository
{

    public function getDroitAccesGroupe()
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codeenti', 'c')
            ->leftJoin('c.codepack', 'r')
            ->orderBy('r.ordeaffi', 'DESC')
           /* ->groupBy('r.codepack')*/
            ->getQuery()->getResult();
    }


}