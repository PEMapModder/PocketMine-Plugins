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
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info(TextFormat::YELLOW."Your configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
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
    	    	    	$sender->setNameTag(null);
    	    	    	$sender->sendMessage("Your name tag has been hidden.");
    	    	    }
    	    	    if(strtolower($args[0]) === "money"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "op"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "pos"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "restore"){
    	    	    	$sender->setNameTag($sender->getName());
    	    	    	$sender->sendMessage("Your default name tag has been restored.");
    	    	    }
    	    	    if(strtolower($args[0]) === "set"){
    	    	    	
    	    	    }
    	    	    if(strtolower($args[0]) === "view"){
    	    	    	$sender->sendMessage("Your tag: ".$sender->getNameTag());
    	    	    }
    	    	}
    	    	else{
    	    	    $sender->sendMessage("MyTag commands:");
    	    	    $sender->sendMessage("/tag address: Shows IP address and port number on the name tag");
    	    	    $sender->sendMessage("/tag chat: Shows the last message spoken on the name tag");
    	    	    $sender->sendMessage("/tag health: Shows health on the name tag");
    	    	    $sender->sendMessage("/tag help: Shows all the sub-commands for /tag");
    	    	    $sender->sendMessage("/tag hide: Hides the name tag");
    	    	    $sender->sendMessage("/tag money: Shows the amount of money ");
    	    	    $sender->sendMessage("/tag op: Shows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("/tag pos: Shows current coordinates on the name tag");
    	    	    $sender->sendMessage("/tag restore: Restores current name tag to the default name tag");
    	    	    $sender->sendMessage("/tag set: Changes the name tag to whatever is set");
    	    	    $sender->sendMessage("/tag view: Shows the name tag via message");
    	    	}
    	    }
    	}
    	else{
    	    $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
    	}
    	return true;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("auto-set") === true && $event->getPlayer()->isOp()){
	    $event->getPlayer()->setNameTag("[".$this->getConfig()->get("op-tag")."] ".$sender->getName());
	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){

    }
}
