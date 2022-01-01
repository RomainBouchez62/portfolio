<?php

namespace App\EventSubscriber;

use App\Entity\Diplome;
use App\Entity\Projet;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use \Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface{

//    private $slugger;
//
//    public function __construct(SluggerInterface $slugger)
//    {
//        $this->slugger = $slugger;
//    }
//
//    public static function getSubscribedEvents()
//    {
//        return [
//            BeforeEntityPersistedEvent::class => ['setSlug'],
//        ];
//    }
//
//    public function setSlug(BeforeEntityPersistedEvent $event)
//    {
//        $entity = $event->getEntityInstance();
//
//        //Crée le slug à partir du nom du projet
//        if(($entity instanceof Projet))
//        {
//            $entity->setSlugProjet($this->slugger->slug($entity->getNomProjet()));
//        }
//    }
}