<?php

namespace App\Repository;

use App\Entity\Equipement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Equipement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipement[]    findAll()
 * @method Equipement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementRepository extends ServiceEntityRepository
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipement::class);
    }

    /**
      * @return Equipement[]
      */

    public function findEqp($id){
        $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.house_id','p')
            ->where('Qr.house_id ='.$id);

       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }
}
