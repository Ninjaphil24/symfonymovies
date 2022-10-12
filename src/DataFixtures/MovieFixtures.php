<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Night');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is the description of Batman');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2021/06/18/11/24/batman-6345922_960_720.jpg');
        // Add Data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Avengers: Endgame');
        $movie2->setReleaseYear(2019);
        $movie2->setDescription('This is the description of Avengers');
        $movie2->setImagePath('https://pixabay.com/illustrations/gabriel-moral-illustration-art-2519793/');
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        $manager->flush();
    }
}
