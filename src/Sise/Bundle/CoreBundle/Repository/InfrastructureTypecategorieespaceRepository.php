<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 16:41
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InfrastructureTypecategorieespaceRepository extends EntityRepository
{

    public function getInfrastructureTypes($codeetab, $codetypeetab, $annescol, $coderece)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codetypeespa', 'c')
            ->leftJoin('c.codecateespa', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab', $codeetab)
            ->setParameter('codetypeetab', $codetypeetab)
            ->setParameter('annescol', $annescol)
            ->setParameter('coderece', $coderece)
            ->orderBy('r.codecateespa', 'ASC')
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


} 