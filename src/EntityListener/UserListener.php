<?php

namespace App\EntityListener;

use App\Entity\User1;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserListener
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function prePersist(User1 $user1)
    {
        $this->encodePassword($user1);
    }

    public function preUpdate(User1 $user1)
    {
        $this->encodePassword($user1);
    }

    /**
     * Encode password based on plain password
     *
     * @param User1 $user1
     * @return void
     */
    public function encodePassword(User1 $user1)
    {
        if($user1->getPlainPassword() === null) {
            return;
        }

        $user1->setPassword(
            $this->hasher->hashPassword(
                $user1,
                $user1->getPlainPassword()
            )
        );
        $user1->setPlainPassword(null);
    }
}