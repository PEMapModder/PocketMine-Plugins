<?php

namespace KickOnJoin;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Loader extends PluginBase implements Listener;

    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->players = new Config($this->getDataFolder()."players.yml", Config::YAML, array());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."KickOnJoin enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."KickOnJoin disabled.");
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        $name = $event->getPlayer()->getName();
        $this->players->set($event->getPlayer()->getName(), false);
        if($this->getConfig()->get("enabled") === true){
            if($this->players->get($name) === false){
                $reason = $this->getConfig()->get("KickReason");
                $event->getPlayer()->kick($reason);
            }
        }
    }
}
