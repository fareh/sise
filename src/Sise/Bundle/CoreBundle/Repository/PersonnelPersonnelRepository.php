<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 17/12/2014
 * Time: 11:48
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;


class PersonnelPersonnelRepository extends EntityRepository
{

    public function getPersonels($fieldArray)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.codeetab', 'c')
            ->leftJoin('p.codetypeetab', 't')
            ->where('r.codeetab = :codeetab')
            ->andWhere('t.codetypeetab = :codetypeetab')
            ->setParameter('codeetab', $fieldArray['codeetab'])
            ->setParameter('codetypeetab', $fieldArray['codetypeetab'])
            ->orderBy('p.idenuniq', 'DESC')
            ->getQuery()->getResult();
    }


}