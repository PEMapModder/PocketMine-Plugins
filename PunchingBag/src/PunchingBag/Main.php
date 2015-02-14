<?php

namespace PunchingBag;

use pocketmine\entity\Villager;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."PunchingBag enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."PunchingBag disabled.");
    }
    
    public function onEntityDeath(EntityDeathEvent $event){
        $entity = $event->getEntity();
        if($entity instanceof Villager){
            $event->setCancelled();
        }
    }
}
