<?php

namespace globalshield;

use pocketmine\block\BurningFurnace;
use pocketmine\block\Chest;
use pocketmine\block\Furnace;
use pocketmine\block\IronDoor;
use pocketmine\block\Stonecutter;
use pocketmine\block\Trapdoor;
use pocketmine\block\WoodDoor;
use pocketmine\block\Workbench;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerBucketEmptyEvent;
use pocketmine\event\player\PlayerBucketFillEvent;
use pocketmine\event\player\PlayerInteractEvent;
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
    	    $this->getServer()->getLogger()->warning("§eYour configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onBlockBreak(BlockBreakEvent $event){

    }
    
    public function onBlockPlace(BlockPlaceEvent $event){

    }
    
    public function onPlayerBucketEmpty(PlayerBucketEmptyEvent $event){

    }
    
    public function onPlayerBucketFill(PlayerBucketFillEvent $event){

    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){

    }
}
