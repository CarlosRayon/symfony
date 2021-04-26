<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\DataFixtures\DataProvider;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        foreach (DataProvider::USERS_DATA as  $userData) {

            $user = (new User)
                ->setName($userData['name'])
                ->setSurname($userData['surname'])
                ->setPhone($userData['phone'])
                ->setEmail($userData['email'])
                ->setRoles($userData['roles'])
                ->setCreatedAt(new DateTime())
                ->setUpdatedAt(new DateTime());
                $user->setPassword($this->passwordEncoder->encodePassword($user, $userData['password']));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
