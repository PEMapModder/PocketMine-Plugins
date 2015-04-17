<?php

namespace mytag;

use mytag\MyTagAPI;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;

class MyTagListener implements Listener{

    public function __construct(MyTagAPI $plugin){
    	$this->plugin = $plugin;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	//To-do
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
    	if($this->plugin->settings->getNested("enable.auto-set") === true){
    	    if($this->plugin->tag->exists(strtolower($event->getPlayer()->getName()))){
    	    	$event->getPlayer()->setNameTag($this->tag->get(strtolower($event->getPlayer()->getName())));
    	    }
    	    else{
    	    	$this->plugin->tag->set(strtolower($event->getPlayer()->getName()), $event->getPlayer()->getNameTag());
    	    	$this->plugin->tag->save();
    	    	$this->plugin->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to MyTag at MyTag\\tag.yml");
    	    }
    	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){
    	if($this->plugin->settings->getNested("enable.auto-set") === true){
    	    if($this->plugin->tag->exists(strtolower($event->getPlayer()->getName()))){
    	    	$this->plugin->tag->set(strtolower($event->getPlayer()->getName()), $event->getPlayer()->getNameTag());
    	    }
    	    else{
    	    	$this->plugin->tag->set(strtolower($event->getPlayer()->getName()), $event->getPlayer()->getNameTag());
    	    	$this->plugin->tag->save();
    	    	$this->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to MyTag at MyTag\\tag.yml");
    	    }
    	}
    }
}
