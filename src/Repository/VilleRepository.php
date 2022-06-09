<?php

namespace App\Repository;

use App\Entity\Ville;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ville>
 *
 * @method Ville|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ville|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ville[]    findAll()
 * @method Ville[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ville::class);
    }

    public function add(Ville $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Ville $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param string $value
     * @param $ville
     * @return Ville[] Returns an array of Ville objects
     * @throws \Exception
     */
    public function findBySearch($value): array
    {
        $query = $this->createQueryBuilder('v')
            ->addSelect('v')
            ->andWhere('v.ville = :ville')
            ->orWhere('v.codePostal = :codePostal')
            ->orWhere('v.nom LIKE :value')
            ->setParameter('find', $value)
            ->setParameter('ville', $value)
            ->setParameter('codePostal', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery();
        try {
            return $query->getResult();
        } catch (\Exception $e) {
            throw new \Exception('problème ' . $e->getMessage() . $e->getFile());
        }
    }

    public function findOneBySomeField($value): ?Ville
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
