<?php

namespace imanager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase implements Listener{

    public $chat;
    
    public $exempt;
    
    public $ip;
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
            $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
            $this->ip = new Config($this->getDataFolder()."ip.txt", Config::ENUM);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
	    $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->chat->save();
        $this->exempt->save();
        $this->ip->save();
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if(strtolower($command->getName()) === "imanager"){
    	    if(isset($args[0])){
    	    	if(strtolower($args[0]) === "addip"){
    	    		
    	    	} 
    	    	if(strtolower($args[0]) === "addresslist"){

    	    	}
    	    	if(strtolower($args[0]) === "delip"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "gamemodelist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "healthlist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "info"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "kickall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "killall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "moneylist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "opall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "oplist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "poslist"){
    	    		
    	    	}
    	    	else{
    	    		
    	    	}
    	    }
    	    else{
    	    	$sender->sendMessage();
    	    }
    	}
    	return true;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	if($this->getConfig()->get("enable")["chat-log"] === true){
    	    $this->chat->set($event->getPlayer()->getName() => $event->getMessage());
    	}
    }
    
    public function onPlayerPreLogin(PlayerPreLoginEvent $event){
    	if($this->ip->exists($event->getPlayer()->getAddress())){
    	}
    	else{
    	    $event->getPlayer()->kick();
    	}
    }
}
