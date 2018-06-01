<?php
// src/OC/PlatformBundle/Pure/OCAntispam.php

namespace OC\PlatformBundle\Purge;

use Doctrine\ORM\EntityManager;

class OCPlatformPurge
{
  private $em;

  public function __construct(EntityManager $em)
  {
    $this->em    = $em;
  }

  public function purger($days)
  {
      $date = new \Datetime($days.' days  ago');
      $em= $this->em;
      $advertPurges=$em->getRepository('OCPlatformBundle:Advert')->getAdvertsBefore($date);
      
      foreach ($advertPurges as $advert) 
      {
          //  On  récupère  les AdvertSkill liées à cette annonce
          $advertSkills = $em->getRepository('OCPlatformBundle:AdvertSkill')->findBy(array('advert'  =>  $advert));
          //  Pour  les supprimer toutes  avant de  pouvoir supprimer l'annonce elle-même
          foreach ($advertSkills  as  $advertSkill) 
              {
                  $em->remove($advertSkill);
              }

          $em->remove($advert);
      
      }
      
      $em->flush();
  }
}



