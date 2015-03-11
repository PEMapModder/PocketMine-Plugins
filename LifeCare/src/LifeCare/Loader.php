<?php

namespace LifeCare;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."LifeCare enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."LifeCare disabled.");
    }
    
    public function onEntityDamage(EntityDamageEvent $event){
      
    }
    
    public function onEntityRegainHealth(EntityRegainHealthEvent $event){
      
    }
}
