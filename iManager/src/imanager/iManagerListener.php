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
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	if($this->plugin->settings->getNested("enable.save-chat") === true){
    	    $this->plugin->chat->set($event->getPlayer()->getName().": ".$event->getMessage());
    	    $this->plugin->chat->save();
    	}
    }
    
    public function onPlayerCommandPreprocess(PlayerCommandPreprocessEvent $event){
    	if($this->plugin->settings->getNested("enable.log-commands") === true){
    	    if($event->getMessage()[0] === "/"){
    	    	$this->plugin->getServer()->getLogger()->notice($event->getPlayer()->getName()." issued command: ".$event->getMessage());
    	    }
    	}
    }
    
    public function onPlayerPreLogin(PlayerPreLoginEvent $event){
    	if($this->plugin->settings->getNested("enable.ip-whitelist") === true){
    	    if($this->plugin->ip->exists(strtolower($event->getPlayer()->getAddress()))){
    	    }
    	    else{
    	    	$event->setCancelled(true);
    	    }
    	}
    }
}
