<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $message1 = new Contact();
        $message1->setName('Szymon');
        $message1->setEmail('szymon@example.com');
        $message1->setSubject('Subject1');
        $message1->setDescription('Lorem ipsum ...');

        $message2 = new Contact();
        $message2->setName('Ania');
        $message2->setEmail('ania@example.com');
        $message2->setSubject('Subject2');
        $message2->setDescription('Lorem ipsum ...');
        
        $manager->persist($message1);
        $manager->persist($message2);

        $manager->flush();
    }
}