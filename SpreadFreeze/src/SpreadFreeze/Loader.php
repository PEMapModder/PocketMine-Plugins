<?php

namespace SpreadFreeze;

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
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info(TextFormat::YELLOW."Your configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onBlockUpdate(BlockUpdateEvent $event){
        if($event->getBlock() instanceof Lava && $this->getConfig()->get("enable")["spread"]["lava"] === false){
            $event->setCancelled();
        }
        if($event->getBlock() instanceof Water && $this->getConfig()->get("enable")["spread"]["water"] === false){
            $event->setCancelled();
        }
    }
}
