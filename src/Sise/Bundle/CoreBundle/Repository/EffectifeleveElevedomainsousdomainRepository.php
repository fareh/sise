<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 25/12/2014
 * Time: 11:36
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EffectifeleveElevedomainsousdomainRepository extends EntityRepository
{

    public function getElevedomainsousdomain($items)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codesousdoma', 'c')
            ->leftJoin('c.codedoma', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->orderBy('r.codedoma', 'DESC')
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


}