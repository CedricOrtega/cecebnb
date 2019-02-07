<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create("fr-FR");


        for($i=1;$i<=100;$i++){

            $title = $faker->sentence();
            $coverImage = $faker->imageUrl(1000,350);
            $introduction = $faker->paragraph(2);
            $content = "<p>". join("</p><p>",$faker->paragraphs(5)) . "</p>";

            $ad = new Ad();

            $ad->setTitle($title)
            ->setCoverImage($coverImage)
            ->setIntroduction($introduction)
            ->setContent($content)
            ->setPrice(mt_rand(29,500))
            ->setRooms(mt_rand(1,6));

            $manager->persist($ad);
        }

        $manager->flush();
    }
}
