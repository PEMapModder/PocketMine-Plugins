<?php

namespace KickOnJoin;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener;

    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info(TextFormat::GREEN."KickOnJoin enabled.");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info(TextFormat::RED."KickOnJoin disabled.");
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("enabled") === true){
            $event->getPlayer()->kick()
        }
    }
}
