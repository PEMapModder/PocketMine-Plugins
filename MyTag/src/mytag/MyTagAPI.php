<?php

namespace mytag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class MyTagAPI extends PluginBase implements Listener{
    
    public $tag;
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->tag->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	//To-do
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
    	if($this->getConfig()->get("enable")["auto-set"] === true){
    	    if($this->tag->exists(strtolower($event->getPlayer()->getName()))){
    	    	$event->getPlayer()->setNameTag($this->tag->get(strtolower($event->getPlayer()->getName())));
    	    }
    	    else{
    	    	$this->tag->set(strtolower($event->getPlayer()->getName()), $event->getPlayer()->getNameTag());
    	    	$this->tag->save();
    	    	$this->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to MyTag at MyTag\\tag.yml");
    	    }
    	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){
    	if($this->getConfig()->get("enable")["auto-set"] === true){
    	    if($this->tag->exists(strtolower($event->getPlayer()->getName()))){
    	    	$this->tag->set(strtolower($event->getPlayer()->getName()), $event->getPlayer()->getNameTag());
    	    }
    	    else{
    	    	$this->tag->set(strtolower($event->getPlayer()->getName()), $event->getPlayer()->getNameTag());
    	    	$this->tag->save();
    	    	$this->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to MyTag at MyTag\\tag.yml");
    	    }
    	}
    }
}
