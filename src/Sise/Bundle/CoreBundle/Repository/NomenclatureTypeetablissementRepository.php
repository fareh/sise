<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 16/12/2014
 * Time: 13:14
 */

namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
class NomenclatureTypeetablissementRepository  extends  EntityRepository{

    public function findNomenclatureTypeetablissement($NomenclatureTypeetablissement)
    {
        return $this->createQueryBuilder('p')
            ->where('p.codetypeetab = :codetypeetab')
            ->setParameter('codetypeetab', $NomenclatureTypeetablissement);
    }

} 