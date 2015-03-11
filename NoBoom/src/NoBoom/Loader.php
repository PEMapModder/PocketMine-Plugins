<?php

namespace NoBoom;

use pocketmine\entity\Creeper;
use pocketmine\entity\PrimedTNT;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Server;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."NoBoom enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."NoBoom disabled.");
    }
    
    public function onEntityExplode(EntityExplodeEvent $event){
        if($event->getEntity() instanceof Creeper){
            $event->setCancelled();
            $this->getServer()->broadcastMessage("Explosion has been cancelled.");
        }
        elseif($event->getEntity() instanceof PrimedTNT){
            $this->getServer()->broadcastMessage("Explosion has been cancelled.");
            $event->setCancelled();
        }
    }
}
