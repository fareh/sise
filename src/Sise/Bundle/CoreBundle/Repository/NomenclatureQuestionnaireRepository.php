<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2014
 * Time: 10:51
 */
namespace Sise\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NomenclatureQuestionnaireRepository extends EntityRepository
{


    public function getQuestionnaires($codepack)
    {
        return $this->createQueryBuilder('p')
            ->where('p.codepack = :codepack')
         /*   ->andWhere('p.codeenti != :codeenti')*/
            ->setParameter('codepack', $codepack)
         /*   ->setParameter('codeenti', '')*/
            ->getQuery()->getResult();
    }


}
