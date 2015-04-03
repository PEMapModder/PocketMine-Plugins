<?php

namespace Commander;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\event\player\PlayerBedLeaveEvent;
use pocketmine\event\player\PlayerBucketEmptyEvent;
use pocketmine\event\player\PlayerBucketFillEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerRespawnEvent;
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
    
    public function onBlockBreak(BlockBreakEvent $event){
        
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
        
    }
    
    public function onPlayerBedEnter(PlayerBedEnterEvent $event){
        
    }
    
    public function onPlayerBedLeaveEvent(PlayerBedLeaveEvent $event){
        
    }
    
    public function onPlayerBucketEmpty(PlayerBucketEmptyEvent $event){
        
    }
    
    public function onPlayerBucketFill(PlayerBucketFillEvent $event){
        
    }
    
    public function onPlayerDeath(PlayerDeathEvent $event){
        
    }
    
    public function onPlayerDropItem(PlayerDropItemEvent $event){
        
    }
    
    public function onPlayerGameModeChange(PlayerGameModeChangeEvent $event){
        
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        
    }
    
    public function onPlayerItemConsume(PlayerItemConsumeEvent $event){
        
    }
    
    public function onPlayerItemHeld(PlayerItemHeldEvent $event){
        
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        
    }
    
    public function onPlayerKick(PlayerKickEvent $event){
        
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        
    }
}
