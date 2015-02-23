<?php

namespace ArmorAlert;

use pocketmine\event\entity\EntityArmorChangeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Server;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."ArmorAlert enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."ArmorAlert disabled.");
    }
    
    public function onEntityArmorChange(EntityArmorChangeEvent $event){
        $entity = $event->getEntity();
        if($entity instanceof Player){    
            $oldarmor = $entity->getOldItem();
            $newarmor = $entity->getNewItem();
            $name = $entity->getPlayer()->getDisplayName();
            $this->getServer()->broadcastMessage($name." changed from ".$oldarmor." to ".$newarmor.".");
        }
    }
}
