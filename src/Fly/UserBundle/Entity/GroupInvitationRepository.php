<?php

namespace Fly\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GroupInvitationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupInvitationRepository extends EntityRepository
{

    public function checkUserInvite($user, $group)
    {
        $qb = $this->createQueryBuilder('gi')
//            ->leftJoin('g.users','user')
//            ->leftJoin('g.invitation', 'invitation')
            ->where('gi.user = :user')
            ->andWhere('gi.group = :group')
            ;

        $qb->setParameter('user',$user);
        $qb->setParameter('group',$group);


        return $qb->getQuery()->getOneOrNullResult();
    }


}
