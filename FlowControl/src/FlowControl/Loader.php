<?php

namespace FlowControl;

use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."FlowControl enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."FlowControl disabled.");
    }
    
    public function onBlockSpread(BlockSpreadEvent $event){
        if($event->getBlock()->getId() === 8 && $this->getConfig()->get("spread-water") === false){
            $event->setCancelled();
        }
        elseif($event->getBlock()->getId() === 9 && $this->getConfig()->get("spread-water") === false){
            $event->setCancelled();
        }
        elseif($event->getBlock()->getId() === 10 && $this->getConfig()->get("spread-lava") === false){
            $event->setCancelled();
        }
        elseif($event->getBlock()->getId() === 11 && $this->getConfig()->get("spread-lava") === false){
            $event->setCancelled();
        }
    }
}
