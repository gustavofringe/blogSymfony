<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace Blog\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\BlogBundle\Entity\Post;

class LoadTitle implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $titles = [
            'Dans la ruche',
            'nettoyage hépatique',
            'Ce qui est bon',
            'A l\'approche de l\'automne',
            'Réseau'
        ];

        foreach ($titles as $title) {
            // On crée la catégorie
            $category = new Post();
            $category->setTitle($title);

            // On la persiste
            $manager->persist($category);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}