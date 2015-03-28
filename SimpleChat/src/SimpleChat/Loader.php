<?php

namespace SimpleChat;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent
use pocketmine\event\player\PlayerQuitEvent;
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
        $event->setFormat(str_replace(["{ip}", "{level}", "{message}", "{player}", "{port}"], [$event->getPlayer()->getAddress(), $event->getPlayer()->getLevel()->getName(), $event->getMessage(), $event->getPlayer()->getName(), $event->getPlayer()->getPort()], $this->getConfig()->get("format")));
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("mute-join-message") === true){
            $event->setJoinMessage(null);
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if($this->getConfig()->get("mute-quit-message") === true){
            $event->setQuitMessage(null);
        }
    }
}
