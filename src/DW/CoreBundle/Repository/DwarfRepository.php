<?php

namespace DW\CoreBundle\Repository;

/**
 * DwarfRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DwarfRepository extends \Doctrine\ORM\EntityRepository
{
    public function countDwarves($gang) {

        return $this->createQueryBuilder('dwarf')
                    ->andWhere('dwarf.gang = :gang_id')
                    ->setParameter('gang_id', $gang)
                    ->select('COUNT(dwarf.id)')
                    ->getQuery()
                    ->getSingleScalarResult();
    }
}
