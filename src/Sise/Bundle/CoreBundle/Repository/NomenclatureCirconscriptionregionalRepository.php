<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 13:08
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NomenclatureCirconscriptionregionalRepository extends EntityRepository
{

    public function findNomenclatureCirconscriptionregional($NomenclatureCirconscriptionregional)
    {
        return $this->createQueryBuilder('p')
            ->where('p.codecircregi = :codecircregi')
            ->setParameter('codecircregi', $NomenclatureCirconscriptionregional);
    }


} 