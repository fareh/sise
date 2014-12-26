<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/12/2014
 * Time: 18:05
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EffectifeleveResidantboursierCycleenseignementRepository extends EntityRepository
{

    public function getResidantboursierCycleenseignement($items)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codecyclense', 'c')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->andWhere('c.codecyclense = :codecyclense')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->setParameter('codecyclense', $items['codecyclense'])
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


}