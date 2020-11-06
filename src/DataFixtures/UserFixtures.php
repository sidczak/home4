<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'adminpass'
        ));

        $user = new User();
        $user->setEmail('user@example.com');
        $user->setRoles(array('ROLE_USER'));
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'userpass'
        ));

        $manager->persist($admin);
        $manager->persist($user);

        $manager->flush();
    }
}
