<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\User1;
use App\Entity\Vehicle;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

       

        // Récupérer un utilisateur existant (par exemple, le premier utilisateur créé)
        $user = $manager->getRepository(User::class)->findOneBy([]);
        // Assurez-vous qu'un utilisateur a été trouvé avant de l'associer au véhicule
        if ($user) {
        $vehicle1->setUser($user);
        } else {
    // Gérer le cas où aucun utilisateur n'est trouvé
}


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

        // Création de plusieurs entités User1
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $user1 = new User1();
            // Définir les valeurs des propriétés de User1
            $user1->setFullname($faker->name())
                ->setPseudo(mt_rand(0, 1) === 1 ? $faker->firstName() : null)
                ->setEmail($faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');

           

            $manager->persist($user1);
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



        