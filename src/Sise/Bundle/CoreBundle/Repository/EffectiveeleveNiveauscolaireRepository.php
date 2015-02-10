<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24/12/2014
 * Time: 09:01
 */
namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EffectiveeleveNiveauscolaireRepository extends EntityRepository
{

    public function getEffectiveeleveNiveauscolaire($codeetab, $codetypeetab, $annescol, $coderece)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codenivescol', 'c')
            ->leftJoin('p.codefili', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab', $codeetab)
            ->setParameter('codetypeetab', $codetypeetab)
            ->setParameter('annescol', $annescol)
            ->setParameter('coderece', $coderece)
          ->orderBy('p.codefili', 'ASC')
         /*  ->groupBy('p.codefili')*/
            ->getQuery()->getResult();
    }


}