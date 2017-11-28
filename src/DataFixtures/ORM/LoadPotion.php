<?php

namespace App\DataFixtures\ORM;

use App\Entity\Player;
use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPotion extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $potions = [
            new Potion('Coca cola', 5, 5),
            new Potion('Elixir', 10, 55),
            new Potion('Fanta', 10, 87),
            new Potion('Vittel', 30, 9999),
        ];

        foreach ($potions as $potion) {
            $this->addReference($potion->getName(), $potion);
            $manager->persist($potion);
        }

        $manager->flush();
    }
}
