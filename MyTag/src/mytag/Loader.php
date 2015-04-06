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

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if($sender instanceof Player){
    	    if(strtolower($command->getName()) === "mytag"){
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
    	    	    $sender->sendMessage("/mytag address: Shows IP address and port number on the name tag");
    	    	    $sender->sendMessage("/mytag chat: Shows the last message spoken on the name tag");
    	    	    $sender->sendMessage("/mytag health: Shows health on the name tag");
    	    	    $sender->sendMessage("/mytag help: Shows all the sub-commands for /tag");
    	    	    $sender->sendMessage("/mytag hide: Hides the name tag");
    	    	    $sender->sendMessage("/mytag money: Shows the amount of money ");
    	    	    $sender->sendMessage("/mytag op: Shows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("/mytag pos: Shows current coordinates on the name tag");
    	    	    $sender->sendMessage("/mytag restore: Restores current name tag to the default name tag");
    	    	    $sender->sendMessage("/mytag set: Changes the name tag to whatever is set");
    	    	    $sender->sendMessage("/mytag view: Shows the name tag via message");
    	    	}
    	    }
    	}
    	else{
    	    $sender->sendMessage("§cPlease run this command in-game.");
    	}
    	return true;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
	if(file_exists($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml")){
		
	}
	else{
	    $this->getServer()->getLogger()->info("§eCreated new data file for ".$event->getPlayer()->getName()." at MyTag\\data\\".$event->getPlayer()->getName().".yml");
	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){
	file_put_contents($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml", yaml_emit(array("tag" => $event->getPlayer()->getNameTag())));
    }
}
