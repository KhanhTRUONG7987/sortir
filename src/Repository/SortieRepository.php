<?php

namespace App\Repository;


use App\Entity\Sortie;
use App\Form\Model\FiltresAccueilModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Sortie>
 *
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

    public function add(Sortie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sortie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findActivityByFilters(FiltresAccueilModel $filtresAccueilModel)
    {
        // 's' pour sortie
        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder->addSelect('s');

        if ($filtresAccueilModel->getCampus()) {
            $queryBuilder->andWhere('s.sortieOrganisee = :campus')
                ->setParameter('campus', $filtresAccueilModel->getCampus());

        }

        if ($filtresAccueilModel->getMotCles()) {
            $queryBuilder->andWhere('s.nom = :motCles')
                ->setParameter('motCles', $filtresAccueilModel->getMotCles());

        }

        if ($filtresAccueilModel->getDateHeureDebut()) {
            $queryBuilder->andWhere('s.dateHeureDebut = :dateHeureDebut')
                ->setParameter('dateHeureDebut', $filtresAccueilModel->getDateHeureDebut());

        }

        if ($filtresAccueilModel->getDateLimiteInscription()) {
            $queryBuilder->andWhere('s.dateLimiteInscription = :dateLimiteInscription')
                ->setParameter('dateLimiteInscription', $filtresAccueilModel->getDateLimiteInscription());


        }

        //à vérifier

        if ($filtresAccueilModel->getEstOrganisateur()) {
            $queryBuilder->andWhere('s.estOrganisateur = :estOrganisateur')
                ->setParameter('estOrganisateur', $filtresAccueilModel->getEstOrganisateur());


        }

        if ($filtresAccueilModel->getInscrit()) {
            $queryBuilder->andWhere('s.inscrit = :inscrit')
                ->setParameter('inscrit', $filtresAccueilModel->getInscrit());


        }

        if ($filtresAccueilModel->getPasInscrit()) {
            $queryBuilder->andWhere('s.pasInscrit = :pasInscrit')
                ->setParameter('pasInscrit', $filtresAccueilModel->getPasInscrit());


        }


        return $queryBuilder->getQuery()->getResult();


    }
}
