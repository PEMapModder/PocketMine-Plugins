<?php

namespace IPTag;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."IPTag enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."IPTag disabled.");
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        $player->setNameTag($event->getPlayer()->getName()." ".$event->getPlayer()->getAddress());
    }
}
