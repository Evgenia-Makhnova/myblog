<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $newPost1 = $this->getReference('newPost1');
        $newPost2 = $this->getReference('newPost2');
        $user2 = $this->getReference('user2');
        $user3 = $this->getReference('user3');
        $user4 = $this->getReference('user4');

        $com1 = new Comment();
        $com1->setCreateAt(new \DateTime('2020-1-1'));
        $com1->setContent('Первый комментарий');
        $com1->setPost($newPost1);
        $com1->setUser($user2);
        $manager->persist($com1);

        $com2 = new Comment();
        $com2->setCreateAt(new \DateTime('2010-1-1'));
        $com2->setContent('Второй комментарий');
        $com2->setPost($newPost1);
        $com2->setUser($user3);
        $manager->persist($com2);

        $com3 = new Comment();
        $com3->setCreateAt(new \DateTime('2015-1-1'));
        $com3->setContent('Третий комментарий');
        $com3->setPost($newPost1);
        $com3->setUser($user4);
        $manager->persist($com3);

        $com4 = new Comment();
        $com4->setCreateAt(new \DateTime('2017-1-1'));
        $com4->setContent('Четвертый комментарий');
        $com4->setPost($newPost2);
        $com4->setUser($user4);
        $manager->persist($com4);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
