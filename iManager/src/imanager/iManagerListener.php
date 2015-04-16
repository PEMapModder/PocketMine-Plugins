<?php

namespace imanager;

use imanager\iManagerAPI;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\Listener;

class iManagerListener implements Listener{

    public function __construct(iManagerAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	if($this->getConfig()->get("enable")["chat-log"] === true){
    	    $this->chat->set($event->getPlayer()->getName().": ".$event->getMessage());
    	}
    }
    
    public function onPlayerCommandPreprocess(PlayerCommandPreprocessEvent $event){
    	if($this->getConfig()->get("enable")["log-commands"] === true){
    	    if($event->getMessage()[0] === "/"){
    	    	$this->getServer()->getLogger()->notice($event->getPlayer()->getName()." issued command: ".$event->getMessage());
    	    }
    	}
    }
    
    public function onPlayerPreLogin(PlayerPreLoginEvent $event){
    	if($this->getConfig()->get("enable")["ip-whitelist"] === true){
    	    if($this->ip->exists(strtolower($event->getPlayer()->getAddress()))){
    	    }
    	    else{
    	    	$event->setCancelled();
    	    }
    	}
    }
}
