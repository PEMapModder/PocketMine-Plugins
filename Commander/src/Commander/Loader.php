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
        if($this->getConfig()->get("enable")["command"]["on-block-break"] === true){
            
        }
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-block-break"] === true){
            
        }
    }
    
    public function onPlayerBedEnter(PlayerBedEnterEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bed-enter"] === true){
            
        }    }
    
    public function onPlayerBedLeaveEvent(PlayerBedLeaveEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bed-leave"] === true){
            
        }  
    }
    
    public function onPlayerBucketEmpty(PlayerBucketEmptyEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bucket-empty"] === true){
            
        }
    }
    
    public function onPlayerBucketFill(PlayerBucketFillEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bucket-fill"] === true){
            
        } 
    }
    
    public function onPlayerDeath(PlayerDeathEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-death"] === true){
            
        }
    }
    
    public function onPlayerDropItem(PlayerDropItemEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-drop-item"] === true){
            
        }
    }
    
    public function onPlayerGameModeChange(PlayerGameModeChangeEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-gamemode-change"] === true){
            
        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-interact"] === true){
            
        }
    }
    
    public function onPlayerItemConsume(PlayerItemConsumeEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-item-consume"] === true){
            
        }
    }
    
    public function onPlayerItemHeld(PlayerItemHeldEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-item-held"] === true){
            
        }
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-join"] === true){
            
        }
    }
    
    public function onPlayerKick(PlayerKickEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-kick"] === true){
            
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-quit"] === true){
            
        }  
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-respawn"] === true){
            
        }   
    }
}
