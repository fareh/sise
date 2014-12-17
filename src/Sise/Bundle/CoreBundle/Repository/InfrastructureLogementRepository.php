<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 17/12/2014
 * Time: 09:39
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
class InfrastructureLogementRepository extends  EntityRepository{

    public function getInfrastructureLogement($codeetab,  $codetypeetab, $annescol, $coderece)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codeequi', 'c')
            ->leftJoin('c.codecateequi', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab' , $codeetab)
            ->setParameter('codetypeetab' , $codetypeetab)
            ->setParameter('annescol',$annescol)
            ->setParameter('coderece',$coderece)
            ->orderBy('r.codecateequi', 'ASC')
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


}