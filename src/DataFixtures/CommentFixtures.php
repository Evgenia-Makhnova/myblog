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
        $com1->setAuthor('Мария');
        $com1->setCreadate(new \DateTime('2020-1-1'));
        $com1->setContent('Первый комментарий');
        $com1->setPost($newPost1);
        $com1->setUser($user2);
        //$newPost1->addComments($com1);
        $manager->persist($com1);

        $com2 = new Comment();
        $com2->setAuthor('Александр');
        $com2->setCreadate(new \DateTime('2010-1-1'));
        $com2->setContent('Второй комментарий');
        $com2->setPost($newPost1);
        $com2->setUser($user3);
        //$newPost1->addComments($com2);
        $manager->persist($com2);

        $com3 = new Comment();
        $com3->setAuthor('Марк');
        $com3->setCreadate(new \DateTime('2015-1-1'));
        $com3->setContent('Третий комментарий');
        $com3->setPost($newPost1);
        $com3->setUser($user4);
        //$newPost1->addComments($com2);
        $manager->persist($com3);

        $com4 = new Comment();
        $com4->setAuthor('Марк');
        $com4->setCreadate(new \DateTime('2017-1-1'));
        $com4->setContent('Четвертый комментарий');
        $com4->setPost($newPost2);
        $com4->setUser($user4);
        //$newPost1->addComments($com2);
        $manager->persist($com4);

        $manager->flush();
    /*$commentData = [
    0 => [
    'author' => 'Мария',
    'content' => 'Первый комментарий',
        'user' => 1,
        'post' => 1

    ],
    1 => [
    'author' => 'Иван',
    'content' => 'Второй комментарий',
        'user' => 2,
        'post' => 2
    ]
    ];

    foreach ($commentData as $com) {
    $newComment = new Comment();
    $newComment->setAuthor($com['author']);
    $newComment->setCreadate(new \DateTime('2020-09-22'));
    $newComment->setContent($com['content']);
    $newComment->setUser(1);
    $newComment->setPost(1);
    $manager->persist($newComment);
    }*/


    }

    public function getOrder()
    {
        return 2;
    }
}
