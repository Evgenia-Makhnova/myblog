<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class PostFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $newPost1 = new Post();
        $newPost1->setName('Первая статья блога');
        $newPost1->setCreadate(new \DateTime('2020-12-1'));
        $newPost1->setPosttext('Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 Текст 1 ');
        $newPost1->setViews(5);
        $newPost1->setAnnotation('Интересная статья');
        $manager->persist($newPost1);


        $newPost2 = new Post();
        $newPost2->setName('Вторая статья блога');
        $newPost2->setCreadate(new \DateTime('2004-1-1'));
        $newPost2->setPosttext('Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 Текст 2 ');
        $newPost2->setViews(3);
        $newPost2->setAnnotation('Познавательная статья');
        $manager->persist($newPost2);

        $newPost3 = new Post();
        $newPost3->setName('Третья статья блога');
        $newPost3->setCreadate(new \DateTime('2010-1-1'));
        $newPost3->setPosttext('Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 Текст3 ');
        $newPost3->setViews(2);
        $newPost3->setAnnotation('Проверочная статья');
        $manager->persist($newPost3);

        $manager->flush();
        $this->setReference('newPost1', $newPost1);
        $this->setReference('newPost2', $newPost2);
        /*$postData = [
            0 => [
                'name' => 'Первая статья блога',
                'posttext' => 'Аквариумистика собаководство велосипеды текст текст текст текст!',
                'creadate' => 2020-01-9,
                'views' => 2,
                'annotation' => 'Интересная статья'
            ],
            1 => [
                'name' => 'Вторая статья блога',
                'posttext' => 'Пушкин, Достоевский, Лермонтов, Цветаева, Горький, Маяковский, Толстой!',
                'creadate' => 1970-1-1,
                'views' => 2,
                'annotation' => 'Познавательная статья'
            ]
        ];

        foreach ($postData as $post) {
            $newPost = new Post();
            $newPost->setName($post['name']);
            $newPost->setCreadate(new \DateTime('2020-1-1'));
            //$newPost->setCreadate(new \DateTime('2010-1-1'));
            $newPost->setPosttext($post['posttext']);
            $newPost->setViews($post['views']);
            $newPost->setAnnotation($post['annotation']);
            $manager->persist($newPost);
        }*/


    }

    public function getOrder()
    {
        return 1;
    }
}
