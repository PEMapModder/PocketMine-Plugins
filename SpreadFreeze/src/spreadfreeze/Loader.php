<?php

namespace spreadfreeze;

use pocketmine\block\Grass;
use pocketmine\block\Lava;
use pocketmine\block\Mycelium;
use pocketmine\block\Podzol;
use pocketmine\block\Water;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\event\block\LeavesDecayEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onBlockGrow(BlockGrowEvent $event){
        
    }
    
    public function onBlockSpread(BlockSpreadEvent $event){
        if($event->getBlock() instanceof Grass && $this->getConfig()->get("enable")["spread"]["grass"] === false){
            $event->setCancelled();
        }
        if($event->getBlock() instanceof Mycelium && $this->getConfig()->get("enable")["spread"]["mycelium"] === false){
            $event->setCancelled();
        }
        if($event->getBlock() instanceof Podzol && $this->getConfig()->get("enable")["spread"]["podzol"] === false){
            $event->setCancelled();
        }
    }
    
    public function onBlockUpdate(BlockUpdateEvent $event){
        if($event->getBlock() instanceof Lava && $this->getConfig()->get("enable")["spread"]["lava"] === false){
            $event->setCancelled();
        }
        if($event->getBlock() instanceof Water && $this->getConfig()->get("enable")["spread"]["water"] === false){
            $event->setCancelled();
        }
    }
    
    public function onLeavesDecay(LeavesDecayEvent $event){
        
    }
}
