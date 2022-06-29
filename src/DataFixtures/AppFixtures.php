<?php

namespace App\DataFixtures;

use App\Entity\Data;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create('fr_FR');
        for ($i=0; $i <10000 ; $i++) { 
            $data=new Data();
            $data->setTitle($faker->sentence(1));
            $data->setContent($faker->paragraph(10));
            $data->setWords($faker->words(10,true));
            $manager->persist($data);
        }
        $manager->flush();
    }
}
