<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 17/12/2014
 * Time: 13:22
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
class EtablissementActiviteRepository extends  EntityRepository{

    public function getEtablissementActivite($codeetab,  $codetypeetab, $annescol, $coderece)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codeacti', 'c')
            ->leftJoin('c.codecateacti', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab' , $codeetab)
            ->setParameter('codetypeetab' , $codetypeetab)
            ->setParameter('annescol',$annescol)
            ->setParameter('coderece',$coderece)
            ->orderBy('r.codecateacti', 'DESC')
            /* ->groupBy('r.codecateespa')*/
            ->getQuery()->getResult();
    }


}