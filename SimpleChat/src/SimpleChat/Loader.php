<?php

namespace SimpleChat;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."SimpleChat enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."SimpleChat disabled.");
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
        
    }
}
