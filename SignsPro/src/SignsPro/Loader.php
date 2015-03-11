<?php

namespace SignsPro;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Sign;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."SignsPro enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."SignsPro disabled.");
    }
    
    public function onBlockBreak(BlockBreakEvent $event){
    
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
    
    }
    
    public function onSignChange(SignChangeEvent $event){
        if($event->getPlayer()->hasPermission("signspro.action.create")){
            if($event->getLine(0) === ""){
                
            }
            if($event->getLine(0) === ""){
                
            }
            if($event->getLine(0) === ""){
                
            }
        }
        else{
            $sender->sendMessage("You don't have permissions to create signs.");
        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($event->getPlayer()->hasPermission("signspro.action.use")){
            
        }
        else{
            $sender->sendMessage("You don't have permission to use signs.");
        }
    }
}
