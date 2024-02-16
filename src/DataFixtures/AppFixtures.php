<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Vehicle;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Creating a user
        $user = new User();
        $user->setName("John");
        $user->setfirtsname("Doe"); // Assurez-vous que la méthode est appelée setFirstName et non setfirtsname
        $user->setemailadress("john.doe@example.com");
        $manager->persist($user);
        $manager->flush();

        // Creating multiple vehicles
        $vehicle1 = new Vehicle();
        $vehicle1->setMake("Toyota");
        $vehicle1->setModel("Camry");
        $vehicle1->setYear(2020);
        $vehicle1->setMileage(50000);
        $vehicle1->setPrice(25000);
        $manager->persist($vehicle1);

        $vehicle2 = new Vehicle();
        $vehicle2->setMake("Ford");
        $vehicle2->setModel("Focus");
        $vehicle2->setYear(2019);
        $vehicle2->setMileage(40000);
        $vehicle2->setPrice(20000);
        $manager->persist($vehicle2);

        $manager->flush();

        // Création d'utilisateurs avec des mots de passe aléatoires
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setName("User".$i);
            $user->setfirtsname("First".$i);
            $user->setemailadress("user".$i."@example.com");
            
            // Générer un mot de passe aléatoire (à remplacer par votre méthode de génération de mot de passe)
            $password = $this->generateRandomPassword();
            $user->setPassword($password);

            $manager->persist($user);
        }

        $manager->flush();
    }

    // Méthode pour générer un mot de passe aléatoire
    private function generateRandomPassword(): string
    {
        // Générer un mot de passe aléatoire (exemple)
        return 'password123';
    }
}
