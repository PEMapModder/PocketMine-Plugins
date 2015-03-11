<?php

namespace GreetMe;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."GreetMe enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."GreetMe disabled.");
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        $player->sendMessage("Welcome, ".$event->getPlayer()->getName().". Your IP address is: ".$event->getPlayer()->getAddress().":".$event->getPlayer()->getPort().".");    
    }
}
