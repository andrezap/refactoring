<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\Purchase;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User('andreza','13/08/1992', 'test address 123 hamburg de');
        $manager->persist($user);

        $purchase = new Purchase('123', $user);
        $manager->persist($purchase);

        for ($i = 0; $i < 10; $i++) {
            $item = new Item('item_' . $i, 'available');
            $manager->persist($item);
        }

        $manager->flush();
    }
}
