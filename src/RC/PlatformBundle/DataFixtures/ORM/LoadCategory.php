<?php

namespace RC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RC\PlatformBundle\Entity\Category;

class LoadCategory implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
            "Action",
            "Animation",
            "Aventure",
            "Art Martiaux",
            "Biopic",
            "Catastrophe",
            "Comédie",
            "Comédie Dramatique",
            "Comédie Musicale",
            "Comédie Policière",
            "Comédie Romantique",
            "Court Métrage",
            "Dessin Animé",
            "Documentaire",
            "Drame",
            "Drame Psychologique",
            "Epouvante",
            "Erotique",
            "Erotique X",
            "Espionnage",
            "Fantastique",
            "Guerre",
            "Historique",
            "Horreur",
            "Manga",
            "Mélodrame",
            "Muet",
            "Musical",
            "Péplum",
            "Policier",
            "Politique",
            "Romance",
            "Science Fiction",
            "Sérial",
            "Sketches",
            "Spectacle",
            "Téléfilm",
            "Théâtre",
            "Thriller",
            "Western",
        );

        foreach ($names as $name) {
            // On crée la catégorie
            $category = new Category();
            $category->setName($name);

            // On la persiste
            $manager->persist($category);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}