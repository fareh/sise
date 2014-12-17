<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 17/12/2014
 * Time: 11:48
 */

namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;


class EffectivepersonelPersonelGradeRepository extends  EntityRepository{

    public function getEffectivepersonel($codeetab,  $codetypeetab, $annescol, $coderece)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codegrad', 'c')
            ->leftJoin('c.codecorp', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab' , $codeetab)
            ->setParameter('codetypeetab' , $codetypeetab)
            ->setParameter('annescol',$annescol)
            ->setParameter('coderece',$coderece)
            ->orderBy('r.codecorp', 'DESC')
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


}