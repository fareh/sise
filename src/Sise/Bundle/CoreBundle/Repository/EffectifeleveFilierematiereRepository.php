<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/12/2014
 * Time: 15:11
 */

namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

class EffectifeleveFilierematiereRepository extends EntityRepository
{

    public function getFilierematiere($items, $codenivescol)
    {
        $codefili = array();

        $rlts= $this->createQueryBuilder('p')
            ->leftJoin('p.codematiopti', 'c')
            ->leftJoin('c.codenivescol', 'n')
            ->leftJoin('p.codefili', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->andWhere('n.codenivescol = :codenivescol')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->setParameter('codenivescol', $codenivescol)
            ->orderBy('c.codematiopti', 'ASC')
            ->addOrderBy('r.codefili', 'ASC')
            ->getQuery()->getResult();

        foreach ($rlts as $key => $rlt) {
            $codefili[$rlt->getCodefili()->getCodefili()][$rlt->getCodematiopti()->getCodematiopti()]= $rlt;

        }
        return $codefili;
    }

    public function getListMatiopti($items, $codenivescol)
    {
        $codematiopti = array();
        $rlts = $this->createQueryBuilder('p')
            ->leftJoin('p.codematiopti', 'c')
            ->leftJoin('c.codenivescol', 'n')
            ->leftJoin('p.codefili', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->andWhere('n.codenivescol = :codenivescol')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->setParameter('codenivescol', $codenivescol)
            ->orderBy('c.codematiopti', 'ASC')
            ->addOrderBy('r.codefili', 'ASC')
            ->groupBy('c.codematiopti')
            ->getQuery()->getResult();
        foreach ($rlts as $key => $rlt) {
            $codematiopti[$rlt->getCodematiopti()->getCodematiopti()] = $rlt->getCodematiopti()->getLibematioptiar();

        }
        return $codematiopti;
    }



    public function getListFli($items, $codenivescol)
    {
        $codefili = array();

        $rlts= $this->createQueryBuilder('p')
            ->leftJoin('p.codematiopti', 'c')
            ->leftJoin('c.codenivescol', 'n')
            ->leftJoin('p.codefili', 'r')
            ->where('p.codeetab = :codeetab')
            ->andWhere('p.codetypeetab = :codetypeetab')
            ->andWhere('p.annescol = :annescol')
            ->andWhere('p.coderece = :coderece')
            ->andWhere('n.codenivescol = :codenivescol')
            ->setParameter('codeetab', $items['codeetab'])
            ->setParameter('codetypeetab', $items['codetypeetab'])
            ->setParameter('annescol', $items['annescol'])
            ->setParameter('coderece', $items['coderece'])
            ->setParameter('codenivescol', $codenivescol)
            ->orderBy('c.codematiopti', 'ASC')
            ->addOrderBy('r.codefili', 'ASC')
            ->groupBy('r.codefili')
            ->getQuery()->getResult();


        foreach ($rlts as $key => $rlt) {
            $codefili[$rlt->getCodefili()->getCodefili()]= $rlt->getCodefili()->getLibefiliar();

        }
        return $codefili;
    }


}