<?php

namespace signspro;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Sign;

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
    
    public function onBlockBreak(BlockBreakEvent $event){
    
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
    
    }
    
    public function onSignChange(SignChangeEvent $event){
        if($event->getPlayer()->hasPermission("signspro.action.create")){
            if($event->getLine(0) === "[Bomb]"){
                
            }
            if($event->getLine(0) === "[Command]"){
                
            }
            if($event->getLine(0) === "[Info]"){
                
            }
        }
        else{
            $sender->sendMessage("§cYou don't have permissions to create signs.");
        }
        return true;
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($event->getBlock() instanceof Sign){
            if($event->getPlayer()->hasPermission("signspro.action.use")){
            
            }
            else{
                $event->getPlayer()->sendMessage("§cYou don't have permission to use signs.");
            }
        }
        return true;
    }
}
