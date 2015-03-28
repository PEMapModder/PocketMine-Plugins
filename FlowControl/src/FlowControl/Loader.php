<?php

namespace FlowControl;

use pocketmine\block\Lava;
use pocketmine\block\Water;
use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onBlockSpread(BlockSpreadEvent $event){
        if($event->getBlock() instanceof Water && $this->getConfig()->get("spread-water") === false){
            $event->setCancelled();
        }
        if($event->getBlock() instanceof Lava && $this->getConfig()->get("spread-lava") === false){
            $event->serCancelled();
        }
    }
}
