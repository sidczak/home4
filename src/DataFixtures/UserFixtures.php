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
        $admin->setIsVerified(1);

        $user = new User();
        $user->setEmail('user@example.com');
        $user->setRoles(array('ROLE_USER'));
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'userpass'
        ));
        $user->setIsVerified(1);

        $manager->persist($admin);
        $manager->persist($user);

        foreach ($this->getUserData() as [$password, $email, $roles]) {
            $sample = new User();
            $sample->setEmail($email);
            $sample->setRoles($roles);
            $sample->setPassword($this->passwordEncoder->encodePassword($sample, $password));

            $manager->persist($sample);
        }

        $manager->flush();

        $this->addReference('user-admin', $admin);
        $this->addReference('user-user', $user);
    }

    private function getUserData(): array
    {
        return [
            // $userData = [$password, $email, $roles];
            ['kitten', 'jane_admin@symfony.com', ['ROLE_ADMIN']],
            ['kitten', 'tom_admin@symfony.com', ['ROLE_ADMIN']],
            ['kitten', 'john_user@symfony.com', ['ROLE_USER']],
        ];
    }
}
