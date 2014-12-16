<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 12:27
 */

namespace Sise\Bundle\CoreBundle\Repository;


use Doctrine\ORM\EntityRepository;


class NomenclatureDelegationRepository extends EntityRepository {


    public function findNomenclatureDelegation($NomenclatureDelegation)
    {
        return $this->createQueryBuilder('p')
            ->where('p.codedele = :CodeDele')
            ->setParameter('CodeDele', $NomenclatureDelegation);
    }


} 