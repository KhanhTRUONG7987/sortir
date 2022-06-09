<?php

namespace App\Repository;

use App\Entity\ProfilPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilPhoto>
 *
 * @method ProfilPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilPhoto[]    findAll()
 * @method ProfilPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilPhoto::class);
    }

    public function add(ProfilPhoto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProfilPhoto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
