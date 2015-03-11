<?php

namespace MyTag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
	$this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."MyTag enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."MyTag disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if($sender instanceof Player){
    	    if(strtolower($command->getName()) === "tag"){
    	    	if(isset($args[0])){
    	    	    if($args[0] === "address"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "chat"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "health"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "help"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "hide"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "money"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "op"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "pos"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "restore"){
    	    	    	
    	    	    }
    	    	    if($args[0] === "view"){
    	    	    	
    	    	    }
    	    	}
    	    	else{
    	    	    $sender->sendMessage();
    	    	}
    	    }
    	}
    	else{
    	    $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
    	    return true;
    	}
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("auto-set") === true && $event->getPlayer()->isOp()){
	    $event->getPlayer()->setNameTag("[".$this->getConfig()->get("op-tag")."] ".$sender->getName());
	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){
    	if($this->getConfig()->get("reset") === true){
    	    $event->getPlayer()->setNameTag($event->getPlayer()->getName());	
    	}
    }
}
