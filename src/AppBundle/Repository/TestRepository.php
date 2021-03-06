<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TestRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TestRepository extends EntityRepository
{
    public function findNumberOfTests()
    {
        $qb = $this->createQueryBuilder('t')
                ->addSelect('COUNT(t.id) as nGames')
                ->leftJoin('t.game', 'g')
                ->groupBy('g.id')
                ->orderBy('nGames', 'DESC')
                ->getQuery();
        
        return $qb->getResult();
    }
}
