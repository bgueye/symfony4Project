<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\AdvertSkill;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Category;
use OC\PlatformBundle\Entity\Image;


class LoadAdvert implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
      $advert1 = new Advert();
      $advert1->setDate(new \Datetime('2017-11-20 14:21:24'));
      $advert1->setTitle('Symfony3');
      $advert1->setAuthor('John@oc.fr');
      $advert1->setContent('Nous cherchons un developpeur(se) Symfony3 pour notre site de creteil');
    
      $appli = new Application();
      $appli ->setDate(new \Datetime('2017-11-17 14:21:24'));
      $appli ->setAuthor($advert1->getAuthor());
      $appli ->setContent('candidature: Je suis interessé');
      $appli ->setAdvert($advert1);
      
      $advert2 = new Advert();
      $advert2->setDate(new \Datetime('2017-11-20 14:21:24'));
      $advert2->setTitle('l\'été en hiver');
      $advert2->setAuthor('Fitz@oc.fr');
      $advert2->setContent('un bon poste pour l\'été');
      
      $advert3 = new Advert();
      $advert3->setDate(new \Datetime('2017-11-16 14:21:24'));
      $advert3->setTitle('JAVA');
      $advert3->setAuthor('Gerald@oc.fr');
      $advert3->setContent('Un bon developpeur JAVA');
      
      $advert4 = new Advert();
      $advert4->setDate(new \Datetime());
      $advert4->setTitle('PHP cakephp');
      $advert4->setAuthor('Kennedy@oc.fr');
      $advert4->setContent('Blablabla');
      
      $advert5 = new Advert();
      $advert5->setDate(new \Datetime('2017-11-12 14:21:24'));
      $advert5->setTitle('WEB et Mobile');
      $advert5->setAuthor('!@oc.fr');
      $advert5->setContent('Blablabla');
    
      $advert6 = new Advert();
      $advert6->setDate(new \Datetime('2017-11-20 14:21:24'));
      $advert6->setTitle('Administrateur Base de données');
      $advert6->setAuthor('oto@oc.fr');
      $advert6->setContent('Blablablablou');
    
      $advert7 = new Advert();
      $advert7->setDate(new \Datetime('2017-11-25 14:21:24'));
      $advert7->setTitle('Developeur web');
      $advert7->setAuthor('oto@oc.fr');
      $advert7->setContent('Blablablablou');
      $advert7->setUpdatedAt(new \Datetime('2017-11-28 14:21:24'));
    
      $advert8 = new Advert();
      $advert8->setDate(new \Datetime('2017-11-22 14:21:24'));
      $advert8->setTitle('Developpeur web');
      $advert8->setAuthor('oto@oc.fr');
      $advert8->setContent('Blablablablou');
      $advert8->setUpdatedAt(new \Datetime('2017-11-21 14:21:24'));
    
      $appli8 = new Application();
      $appli8 ->setDate(new \Datetime('2017-11-17 14:21:24'));
      $appli8 ->setAuthor($advert8->getAuthor());
      $appli8 ->setContent('Candidature donc annonce pas supprimée');
      $appli8 ->setAdvert($advert8);
      
      
      
      
      /*for($i=1; $i<9;$i++)
      {
          
          $manager->persist(${'$advert'.$i});
      }*/
      
      $manager->persist($advert1);
      $manager->persist($advert2);
      $manager->persist($advert3);
      $manager->persist($advert4);
      $manager->persist($advert5);
      $manager->persist($advert6);
      $manager->persist($advert7);
      $manager->persist($advert8);
      
      
      $manager->persist($appli);
      
      $manager->persist($appli8);
      
      $manager->flush();

    }

    

}
