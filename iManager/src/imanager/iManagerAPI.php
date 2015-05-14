<?php

namespace imanager;

use imanager\command\iManagerCommand;
use imanager\iManagerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class iManagerAPI extends PluginBase{

    public $chat, $exempt, $ip, $settings;

    public function onEnable(){
    	$this->saveFiles();
    	$this->command = new iManagerCommand($this);
    	$this->listener = new iManagerListener($this);
	$this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
    	if(!file_exists($this->getDataFolder())){
    	    mkdir($this->getDataFolder());
    	}
    	if(file_exists($this->getDataFolder()."config.yml")){
    	    if(!is_bool($this->getConfig()->getNested("enable.ip-whitelist"))){
    	    	$this->getConfig()->setNested("enable.ip-whitelist", false);
    	    }
    	    if(!is_bool($this->getConfig()->getNested("enable.log-command"))){
    	    	$this->getConfig()->setNested("enable.log-command", true);
    	    }
    	    if(!is_bool($this->getConfig()->getNested("enable.save-chat"))){
    	    	$this->getConfig()->setNested("enable.save-chat", true);
    	    }
    	}
    	else{
    	    $this->saveDefaultConfig();
    	}
    	if(!file_exists($this->getDataFolder()."chat.log")){
    	    $this->chat = new Config($this->getDataFolder()."chat.log", Config::ENUM);
    	    $this->chat->save();
    	}
    	if(!file_exists($this->getDataFolder()."exempt.txt")){
    	    $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
    	    $this->exempt->save();
    	}
    	if(!file_exists($this->getDataFolder()."ip.txt")){
    	    $this->ip = new Config($this->getDataFolder()."ip.txt", Config::ENUM);
    	    $this->ip->save();
    	}
    }

    public function isAddressWhitelisted($address){
    	return $this->ip->exists($address);
    }
    
    public function isPlayerExempted($player){
    	return $this->exempt->exists($player);
    }
}
