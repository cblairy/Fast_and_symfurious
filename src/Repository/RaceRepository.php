<?php

namespace App\Repository;

use App\Entity\Race;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Criteria;

/**
 * @extends ServiceEntityRepository<Race>
 *
 * @method Race|null find($id, $lockMode = null, $lockVersion = null)
 * @method Race|null findOneBy(array $criteria, array $orderBy = null)
 * @method Race[]    findAll()
 * @method Race[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Race::class);
    }

    public function add(Race $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Race $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByRacesDone(): array
    {
        return $this->createQueryBuilder('r')
                    ->addCriteria(
                        Criteria::create()->andWhere(
                        Criteria::expr()->lt('r.date', new \DateTime('now'))
                        )
                    )
                    ->getQuery()
                    ->getResult();
    }

    public function findByNextRaces(): array
    {
        return $this->createQueryBuilder('r')
                    ->addCriteria(
                        Criteria::create()->andWhere(
                        Criteria::expr()->gt('r.date', new \DateTime('now'))
                        )
                    )
                    ->getQuery()
                    ->getResult();
    }

    public function findLastRace(): array
    {
        return $this->createQueryBuilder('r')
                    ->addCriteria(
                        Criteria::create()->andWhere(
                        Criteria::expr()->
                        )
                    )
                    ->getQuery()
                    ->getResult();


                    $sql = '
                    SELECT * 
                    FROM race 
                    WHERE date = ( 
                        SELECT MAX(date) 
                        FROM race 
                        WHERE date < NOW()
                    )';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute()
    }

//    /**
//     * @return Race[] Returns an array of Race objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Race
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
