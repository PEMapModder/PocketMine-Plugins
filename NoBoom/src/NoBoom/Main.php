<?php

namespace NoBoom;

use pocketmine\entity\Creeper;
use pocketmine\entity\PrimedTNT;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."NoBoom enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."NoBoom disabled.");
    }
    
    public function onEntityExplodeEvent(EntityExplodeEvent $event){
        $entity = $event->getEntity();
        if($entity instanceof Creeper){
            $event->setCancelled();
        }
        elseif($entity instanceof PrimedTNT){
            $event->setCancelled();
        }
    }
}
