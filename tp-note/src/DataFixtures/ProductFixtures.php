<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Product;
class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            
            $cat= new Product();
            $sentence = $faker->sentence(4);
            $name = substr($sentence, 0, strlen($sentence) - 1);
            $cat ->setName($name)
                 ->setPrice($faker->randomNumber(2))
                 ->setDescription($faker->text(400))
                 ->setCreatedAt($faker->dateTimeThisYear())
                 ->setPicture($faker->imageUrl($width = 200, $height = 200, 'abstract'));
            $manager->persist($cat);
        }
        $manager->flush();
    }
}
