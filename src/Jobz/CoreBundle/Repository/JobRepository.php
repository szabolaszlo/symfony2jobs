<?php

namespace Jobz\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * JobRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JobRepository extends EntityRepository
{
    public function findByKeyword($keyword)
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('j')
            ->from('CoreBundle:Job', 'j')
            ->where('j.location LIKE :k')
            ->orWhere('j.company LIKE :k')
            ->orWhere('j.position LIKE :k')
            ->setParameters(array('k' => '%' . $keyword . '%'));
        return $qb->getQuery()->getResult();
    }
}