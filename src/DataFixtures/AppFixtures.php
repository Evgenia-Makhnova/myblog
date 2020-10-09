<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture implements OrderedFixtureInterface
{
	private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
	$this->passwordEncoder = $passwordEncoder;
	}
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('mel.m.169@mail.ru');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, 123456));
        $user1->setName('Евгения');
        $user1->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('mel.m.22@mail.ru');
        $user2->setPassword($this->passwordEncoder->encodePassword($user1, 123456));
        $user2->setName('Марк');
        $user2->setRoles(["ROLE_USER"]);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('mel.m.11@mail.ru');
        $user3->setPassword($this->passwordEncoder->encodePassword($user1, 123456));
        $user3->setName('Алина');
        $user3->setRoles(["ROLE_USER"]);
        $manager->persist($user3);

        $user4 = new User();
        $user4->setEmail('mel.m.33@mail.ru');
        $user4->setPassword($this->passwordEncoder->encodePassword($user1, 123456));
        $user4->setName('Маша');
        $user4->setRoles(["ROLE_USER"]);
        $manager->persist($user4);

        $manager->flush();
        $this->setReference('user2', $user2);
        $this->setReference('user3', $user3);
        $this->setReference('user4', $user4);
    }

    public function getOrder()
    {
        return 0;
    }

}
