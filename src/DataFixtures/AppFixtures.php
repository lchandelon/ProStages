<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\entity\Formations;
use App\entity\Stage;
use App\entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
		//création d'un générateur de données faker
		$faker = \Faker\Factory::create('fr_FR');
		
        $informatique = new Formations();
		$informatique->setNom("informatique");
		
		$autre = new Formations();
		$autre->setNom("autre");
		
		$tableauFormations=array($informatique,$autre);
		
		foreach($tableauFormations as $Formations){
			$manager->persist($Formations);
		}
		
		$nbEntreprises=10;
		for ($i=1 ; $i<=$nbEntreprises ; $i++){
			$uneEntreprise = new Entreprise();
			$uneEntreprise->setNom($faker->company);
			$uneEntreprise->setAdresse($faker->streetAddress);
			$uneEntreprise->setActivite($faker->jobTitle);
			$uneEntreprise->setLienSite($faker->url);
			
			$tableauEntreprises[$i-1]=$uneEntreprise;
			$manager->persist($uneEntreprise);
		}
		
		$nbStages=20;
		for ($i=1 ; $i<=$nbStages ; $i++){
			$unStage = new Stage();
			$unStage->setTitre($faker->company);
			$unStage->setDescription($faker->realText);
			$unStage->setEmail($faker->email);
			
			$numFormation = $faker->numberBetween($min=0,$max=1);
			$unStage->AddFormation($tableauFormations[$numFormation]);
			
			$numEntreprise=$faker->numberBetween($min=0,$max=$nbEntreprises-1);
			$unStage->setEntreprise($tableauEntreprises[$numEntreprise]);
			$tableauEntreprises[$numEntreprise]->addStage($unStage);
			
			$manager->persist($unStage);
			$manager->persist($tableauEntreprises[$numEntreprise]);
		}
		
		
        $manager->flush();
    }
}
