<?php

namespace imanager;

use imanager\iManagerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class iManagerAPI extends PluginBase{

    public $chat, $exempt, $ip;

    public function onEnable(){
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->listener = new iManagerListener($this);
            $this->getCommand("imanager")->setExecutor(new commands\iManagerCommand($this));
	    $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->saveFiles();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
    	if(!is_dir($this->getDataFolder())){
    	    mkdir($this->getDataFolder());
    	}
    	if(!file_exists($this->getDataFolder()."chat.txt")){
    	    $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
    	}
    	if(!file_exists($this->getDataFolder()."exempt.txt")){
    	    $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
    	}
    	if(!file_exists($this->getDataFolder()."ip.txt")){
    	    $this->ip = new Config($this->getDataFolder()."ip.txt", Config::ENUM);
    	}
    	if(!file_exists($this->getDataFolder()."settings.yml")){
    	    $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
    	    $this->settings->set("version", $this->getDescription()->getVersion());
    	    $this->settings->setNested("enable.chat-log", true);
    	    $this->settings->setNested("enable.ip-whitelist", false);
    	    $this->settings->setNested("enable.log-commands", true);
    	    $this->settings->set("preferred-economy", "NewCurrency");
    	}
    }
    
    public function saveFiles(){
    	$this->chat->save();
    	$this->exempt->save();
    	$this->ip->save();
    }
    
    public function updateFiles(){
    	if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
    	    unlink($this->getDataFolder."settings.yml");
    	    $this->createFiles();
    	}
    }
    
    public function isAddressWhitelisted($address){
    	return $this->ip->exists($address);
    }
    
    public function isExempted($player){
    	return $this->exempt->exists($player);
    }
}
