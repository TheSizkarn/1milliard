<?php

namespace RC\PlatformBundle\Repository;

class MovieRepository extends \Doctrine\ORM\EntityRepository
{
    public function countMovies()
    {
        $qb = $this->createQueryBuilder('m');
        $qb->select('COUNT(m)');
        return (int) $qb->getQuery()->getSingleScalarResult();
    }
}
