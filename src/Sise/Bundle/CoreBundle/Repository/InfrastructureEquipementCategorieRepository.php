<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 18:05
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
class InfrastructureEquipementCategorieRepository extends  EntityRepository{

    public function getInfrastructureEquipement($codeetab,  $codetypeetab, $annescol, $coderece)
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