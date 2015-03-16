<?php

namespace GlobalShield;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerBucketEmptyEvent;
use pocketmine\event\player\PlayerBucketFillEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."GlobalShield enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."GlobalShield disabled.");
    }
    
    public function onBlockBreak(BlockBreakEvent $event){
        foreach($this->getConfig()->get("levels") as $levels){
            if($levels = $event->getPlayer()->getLevel()->getName()){
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
            if($levels = $event->getPlayer()->getLevel()->getName()){
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
            if($levels = $event->getPlayer()->getLevel()->getName()){
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
            if($levels = $event->getPlayer()->getLevel()->getName()){
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
            if($levels = $event->getPlayer()->getLevel()->getName()){
                if($event->getPlayer()->hasPermission("globalshield.action.interact")){
                }
                else{
                    $event->setCancelled();
                }
            }
        }
    }
}
