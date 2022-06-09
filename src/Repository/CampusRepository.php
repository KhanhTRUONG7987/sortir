<?php

namespace App\Repository;

use App\Entity\Campus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Campus>
 *
 * @method Campus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campus[]    findAll()
 * @method Campus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campus::class);
    }

    public function add(Campus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Campus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param string $value
     * @param $campus
     * @return Campus[] Returns an array of Campus objects
     * @throws \Exception
     */
    public function findBySearch($value, Campus $campus): array
    {
        $query = $this->createQueryBuilder('c')
            ->addSelect('c')
            ->andWhere('c.campus = :campus')
            ->orWhere('c.nom LIKE :value')
            ->setParameter('find', $value)
            ->setParameter('campus', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery();
        try {
            return $query->getResult();
        } catch (\Exception $e) {
            throw new \Exception('problème ' . $e->getMessage() . $e->getFile());
        }
    }

    public function findOneBySomeField($value): ?Campus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
