<?php

namespace locatorpro;

use locatorpro\LocatorPro;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\Listener;

class LocatorProListener implements Listener{

    public function __construct(LocatorProAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->pos->exists($event->getPlayer()->getName())){
            
        }
        else{
            $this->pos->set($event->getPlayer()->getName());
            $this->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to LocatorPro at LocatorPro\\pos.yml");
        }
    }
    
    public function onPlayerMove(PlayerMoveEvent $event){
        if($event->getPlayer()->getFloorY() < $this->getConfig()->get("limit")["minimum-y"]){
            
        }
        if($event->getPlayer()->getFloor() > $this->getConfig()->get("limit")["maximum-y"]){
            
        }
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        $event->getPlayer()->teleport(new Location($this->getConfig()->get("spawn")["x"], $this->getConfig()->get("spawn")["y"], $this->getConfig()->get("spawn")["z"], $this->getConfig()->get("spawn")["yaw"], $this->getConfig()->get("spawn")["pitch"], $this->getConfig()->get("spawn")["level"]);)
    }
}
