<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 02/01/2015
 * Time: 10:24
 */

namespace Sise\Bundle\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class EffectiveeleveNouveauseptiemeanneeRepository extends  EntityRepository {

    public function getNouveauseptiemeannee($items)
    {
       /* return $this->createQueryBuilder('p')
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


        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Sise\Bundle\CoreBundle\Entity\EffectiveeleveNouveauseptiemeannee', 'p');
        $sql = 'SELECT p*, pr*  FROM effectiveeleve_nouveauseptiemeannee p JOIN nomenclature_etablissement pr ON p.CodeEtabSour = pr.CodeEtab';

        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query ->Where('p.codeetab = :codeetab')
        ->andWhere('p.codetypeetab = :codetypeetab')
        ->andWhere('p.annescol = :annescol')
        ->andWhere('p.coderece = :coderece')
        ->setParameter('codeetab', $items['codeetab'])
        ->setParameter('codetypeetab', $items['codetypeetab'])
        ->setParameter('annescol', $items['annescol'])
        ->setParameter('coderece', $items['coderece'])
        ;

        $projects = $query->getResult();

        return $projects;*/

        return "";
    }

} 