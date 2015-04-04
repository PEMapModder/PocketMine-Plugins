<?php

namespace GlobalShield;

use pocketmine\block\BurningFurnace;
use pocketmine\block\Chest;
use pocketmine\block\Furnace;
use pocketmine\block\IronDoor;
use pocketmine\block\Lava;
use pocketmine\block\Stonecutter;
use pocketmine\block\Trapdoor;
use pocketmine\block\Water;
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
            $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onBlockBreak(BlockBreakEvent $event){
        foreach($this->getConfig()->get("levels") as $levels){
            if($levels === $event->getPlayer()->getLevel()->getName()){
                if($event->getPlayer()->hasPermission("globalshield.action.break")){
                }
                else{
                    $event->setCancelled();
                }
            }
        }
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
        foreach($this->getConfig()->get("levels") as $levels){
            if($levels === $event->getPlayer()->getLevel()->getName()){
                if($event->getPlayer()->hasPermission("globalshield.action.place")){
                }
                else{
                    $event->setCancelled();
                }
            }
        }
    }
    
    public function onPlayerBucketEmpty(PlayerBucketEmptyEvent $event){
        foreach($this->getConfig()->get("levels") as $levels){
            if($levels === $event->getPlayer()->getLevel()->getName()){
                if($event->getPlayer()->hasPermission("globalshield.action.empty")){
                }
                else{
                    $event->setCancelled();
                }
            }
        }
    }
    
    public function onPlayerBucketFill(PlayerBucketFillEvent $event){
        foreach($this->getConfig()->get("levels") as $levels){
            if($levels === $event->getPlayer()->getLevel()->getName()){
                if($event->getPlayer()->hasPermission("globalshield.action.fill")){
                }
                else{
                    $event->setCancelled();
                }
            }
        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        foreach($this->getConfig()->get("levels") as $levels){
            if($levels === $event->getPlayer()->getLevel()->getName()){
                if($event->getPlayer()->hasPermission("globalshield.action.interact")){
                }
                else{
                    if($event->getBlock() instanceof BurningFurnace && $this->getConfig()->get("enable")["interact"]["burning-furnace"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof Chest && $this->getConfig()->get("enable")["interact"]["chest"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof Furnace && $this->getConfig()->get("enable")["interact"]["furnace"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof IronDoor && $this->getConfig()->get("enable")["interact"]["iron-door"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof Stonecutter && $this->getConfig()->get("enable")["interact"]["stonecutter"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof Trapdoor && $this->getConfig()->get("enable")["interact"]["trapdoor"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof WoodDoor && $this->getConfig()->get("enable")["interact"]["wood-door"] === false){
                        $event->setCancelled();
                    }
                    if($event->getBlock() instanceof Workbench && $this->getConfig()->get("enable")["interact"]["workbench"] === false){
                        $event->setCancelled();
                    }
                }
            }
        }
    }
}
