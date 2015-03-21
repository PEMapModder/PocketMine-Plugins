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
    	    	    if(strtolower($args[0]) === "address"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "chat"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "health"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "help"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "hide"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "money"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "op"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "pos"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "restore"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "view"){
    	    	    	
    	    	    }
    	    	}
    	    	else{
    	    	    $sender->sendMessage("");
    	    	    $sender->sendMessage("/tag address");
    	    	    $sender->sendMessage("/tag chat");
    	    	    $sender->sendMessage("/tag health");
    	    	    $sender->sendMessage("/tag help");
    	    	    $sender->sendMessage("/tag hide");
    	    	    $sender->sendMessage("/tag money");
    	    	    $sender->sendMessage("/tag op");
    	    	    $sender->sendMessage("/tag pos");
    	    	    $sender->sendMessage("/tag restore");
    	    	    $sender->sendMessage("/tag view");
    	    	    return true;
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
