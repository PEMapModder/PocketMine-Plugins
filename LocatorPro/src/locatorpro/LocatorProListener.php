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

    }
    
    public function onPlayerMove(PlayerMoveEvent $event){

    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        
    }
}
