<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2014
 * Time: 10:51
 */
namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
class OrientationFilieresportRepository extends  EntityRepository
{


        public function getOrientationFilieresport($items)
        {
            return $this->createQueryBuilder('p')
                ->leftJoin('p.codefiliorig', 'c')
                ->where('p.codeetab = :codeetab')
                ->andWhere('p.codetypeetab = :codetypeetab')
                ->andWhere('p.annescol = :annescol')
                ->andWhere('p.coderece = :coderece')
                ->setParameter('codeetab', $items['codeetab'])
                ->setParameter('codetypeetab', $items['codetypeetab'])
                ->setParameter('annescol', $items['annescol'])
                ->setParameter('coderece', $items['coderece'])
                ->orderBy('c.ordraffi', 'DESC')
                ->getQuery()->getResult();
        }


    }
