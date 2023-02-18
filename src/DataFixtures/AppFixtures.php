<?php

namespace App\DataFixtures;

use App\Entity\CategoriesProduit;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 50; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@exemple.com');
            $user->setfirstName('john' . $i);
            $user->setlastName('doe');
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, 'password')
            );

            $manager->persist($user);
        }
        $manager->flush();

        for($i = 1; $i <= 10; $i++) {
            $categoriesproduit = new categoriesproduit();
            $categoriesproduit->setName('categorie' . $i );
            $categoriesproduit->setPictureUrl('https://media.discordapp.net/attachments/601182509719486478/1065687536372027392/nazjak2.png');


            $manager->persist($categoriesproduit);
        }
        $manager->flush();

        $CategoriesProduitRepo = $manager->getRepository(CategoriesProduit::class);
        $allcategoriesproduit = $CategoriesProduitRepo->findAll();

        
        for($i = 1; $i <= 200; $i++){
            $randKey = rand(0, count($allcategoriesproduit) -1);
            $produit = new produit();
            $produit->setName('produit' . $i );
            $produit->setDescription('ceci est un produit');
            $produit->setPictureUrl('https://media.discordapp.net/attachments/601182509719486478/1065687536372027392/nazjak2.png');
            $produit->setCategorie($allcategoriesproduit[$randKey]);
            $produit->setPrice(rand(30, 100) / 10);
            $produit->setSctok(rand(50, 100));

            $manager->persist($produit);
        }
        $manager->flush();

    }
}
