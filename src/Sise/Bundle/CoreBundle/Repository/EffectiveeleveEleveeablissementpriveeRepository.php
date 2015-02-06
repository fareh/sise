<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/12/2014
 * Time: 09:01
 */
namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EffectiveeleveEleveeablissementpriveeRepository extends EntityRepository
{

    public function getEleveeablissementprivee($codeetab, $codetypeetab, $annescol, $coderece)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codenivescol', 'c')
            ->leftJoin('c.codecyclense', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab', $codeetab)
            ->setParameter('codetypeetab', $codetypeetab)
            ->setParameter('annescol', $annescol)
            ->setParameter('coderece', $coderece)
            ->orderBy('c.codenivescol', 'ASC')
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


}