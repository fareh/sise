<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 13:14
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NomenclatureEtablissementRepository extends  EntityRepository {

    public function findNomenclatureEtablissement($NomenclatureEtablissement)
    {
        return $this->createQueryBuilder('p')
            ->where('p.codeetab = :codeetab')
            ->setParameter('codeetab', $NomenclatureEtablissement);
    }

} 