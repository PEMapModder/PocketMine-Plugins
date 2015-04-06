<?php

namespace commander;

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
        if($this->getConfig()->get("enable")["command"]["on-block-break"] === true){
            foreach($this->getConfig()->get("run")["on-block-break"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));      
            }
        }
    }
    
    public function onBlockPlace(BlockPlaceEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-block-break"] === true){
            foreach($this->getConfig()->get("run")["on-block-place"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }       
        }
    }
    
    public function onPlayerBedEnter(PlayerBedEnterEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bed-enter"] === true){
            foreach($this->getConfig()->get("run")["on-player-bed-enter"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }   
    }
    
    public function onPlayerBedLeaveEvent(PlayerBedLeaveEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bed-leave"] === true){
            foreach($this->getConfig()->get("run")["on-player-bed-leave"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }  
    }
    
    public function onPlayerBucketEmpty(PlayerBucketEmptyEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bucket-empty"] === true){
            foreach($this->getConfig()->get("run")["on-player-bucket-empty"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }
    }
    
    public function onPlayerBucketFill(PlayerBucketFillEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-bucket-fill"] === true){
            foreach($this->getConfig()->get("run")["on-player-bucket-fill"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        } 
    }
    
    public function onPlayerDeath(PlayerDeathEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-death"] === true){
            foreach($this->getConfig()->get("run")["on-player-death"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            } 
        }
    }
    
    public function onPlayerDropItem(PlayerDropItemEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-drop-item"] === true){
            foreach($this->getConfig()->get("run")["on-player-drop-item"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }
    }
    
    public function onPlayerGameModeChange(PlayerGameModeChangeEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-gamemode-change"] === true){
            foreach($this->getConfig()->get("run")["on-player-gamemode-change"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-interact"] === true){
            foreach($this->getConfig()->get("run")["on-player-interact"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }
    }
    
    public function onPlayerItemConsume(PlayerItemConsumeEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-item-consume"] === true){
            foreach($this->getConfig()->get("run")["on-player-item-consume"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }
    }
    
    public function onPlayerItemHeld(PlayerItemHeldEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-item-held"] === true){
            foreach($this->getConfig()->get("run")["on-player-item-held"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));
            }
        }
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-join"] === true){
            foreach($this->getConfig()->get("run")["on-player-join"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));
            }
        }
    }
    
    public function onPlayerKick(PlayerKickEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-kick"] === true){
            foreach($this->getConfig()->get("run")["on-player-kick"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));  
            }
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-quit"] === true){
            foreach($this->getConfig()->get("run")["on-player-quit"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command)); 
            }  
        }  
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        if($this->getConfig()->get("enable")["command"]["on-player-respawn"] === true){
            foreach($this->getConfig()->get("run")["on-player-respawn"] as $command){
                $this->getServer()->dispatchCommand(new ConsoleCommandSender, str_replace("{player}", $event->getPlayer()->getName(), $command));
            }
        }   
    }
}
