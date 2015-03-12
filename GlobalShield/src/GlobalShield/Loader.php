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
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."GlobalShield enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."GlobalShield disabled.");
    }
    
    public function onBlockBreak(BlockBreakEvent $event){
        if($event->getPlayer()->hasPermission("globalshield.action.break")){
        }
        else{

        }
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
        if($event->getPlayer()->hasPermission("globalshield.action.place")){
        }
        else{

        }
    }
    
    public function onPlayerBucketEmpty(PlayerBucketEmptyEvent $event){
        if($event->getPlayer()->hasPermission("globalshield.action.empty")){
        }
        else{

        }
    }
    
    public function onPlayerBucketFill(PlayerBucketFillEvent $event){
        if($event->getPlayer()->hasPermission("globalshield.action.fill")){
        }
        else{

        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($event->getPlayer()->hasPermission("globalshield.action.interact")){
            
        }
        else{

        }
    }
}
