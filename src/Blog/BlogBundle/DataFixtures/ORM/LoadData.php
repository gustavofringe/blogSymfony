<?php
// src/Blog/BlogBundle/DataFixtures/ORM/LoadCategory.php

namespace Blog\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\BlogBundle\Entity\Post;
use Faker;
use function rand;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    public function load(ObjectManager $manager)
    {
       $faker = Faker\Factory::create('fr_FR');
       $posts = [];
       for ($i=0;$i<20;$i++){
           $posts[$i] = new Post();
           $posts[$i]->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
               ->setAuthor($faker->firstNameFemale)
               ->setViews($faker->numberBetween(1, 20000))
               ->setCategories($faker->unique()->domainWord)
               ->setCreatedAt($faker->dateTimeThisDecade($max = 'now', $timezone = date_default_timezone_get()))
               ->setContent($faker->realText(rand(100,300)));
           $manager->persist($posts[$i]);
       }


        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }
}