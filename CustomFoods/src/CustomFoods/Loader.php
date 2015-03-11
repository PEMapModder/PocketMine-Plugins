<?php

namespace CustomFood;

use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this-saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."CustomFood enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."CustomFood disabled.");
    }
    
    public function onEntityRegainHealth(EntityRegainHealthEvent $event){
    
    }
    
    public function onPlayerItemConsume(PlayerItemConsumeEvent $event){
    
    }
}
