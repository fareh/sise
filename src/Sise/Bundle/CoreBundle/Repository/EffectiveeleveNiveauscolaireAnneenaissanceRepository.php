<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 25/12/2014
 * Time: 13:37
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EffectiveeleveNiveauscolaireAnneenaissanceRepository extends EntityRepository
{

    public function getNiveauscolaireAnneenaissance($items)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codenivescol', 'c')
            ->leftJoin('p.codeannenais', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->orderBy('c.codenivescol', 'ASC')
            ->addOrderBy('r.codeannenais', 'DESC')
            ->getQuery()->getResult();
    }

    public function getListAnnenais($items)
    {
        $codeannenais = array();
        $rlts = $this->createQueryBuilder('p')
            ->leftJoin('p.codenivescol', 'c')
            ->leftJoin('p.codeannenais', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->orderBy('c.codenivescol', 'ASC')
            ->addOrderBy('r.codeannenais', 'DESC')
            ->groupBy('r.codeannenais')
            ->getQuery()->getResult();

        foreach ($rlts as $key => $rlt) {
            $codeannenais[$key] = $rlt->getCodeannenais()->getLibeannenaisar();

        }

        return $codeannenais;
    }

}