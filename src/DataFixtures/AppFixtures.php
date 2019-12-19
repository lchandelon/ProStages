<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\entity\Formations;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $informatique = new Formations();
		$informatique->setNom("informatique");
        $manager->persist($informatique);

        $manager->flush();
    }
}
