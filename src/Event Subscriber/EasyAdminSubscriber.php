<?php

namespace App\EventSubscriber;

use App\Entity\Diplome;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use \Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface{

//    private $security;
//
//    public function __construct(Security $security)
//    {
//        $this->security = $security;
//    }
//
//    public static function getSubscribedEvents()
//    {
//        return [
//            BeforeEntityPersistedEvent::class => ['setDiplomeUser'],
//        ];
//    }
//
//    public function setDiplomeUser(BeforeEntityPersistedEvent $event)
//    {
//        $entity = $event->getEntityInstance();
//
//        if(!($entity instanceof Diplome))
//        {
//            return;
//        }
//
//        //Attribution du user à l'entity
//        $id = $this->security->getUser();
//        $User = new User();
//        $User->setId($id);
//
//        $entity->setUser($User);
//    }
}