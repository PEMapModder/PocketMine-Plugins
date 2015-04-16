<?php

namespace imanager;

use imanager\iManagerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class iManagerAPI extends PluginBase implements Listener{

    public $chat;
    
    public $exempt;
    
    public $ip;
    
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
    	if(!file_exists($this->getDataFolder()."chat.txt")){
    	    $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
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
    	if(!file_exists($this->getDataFolder()."settings.yml")){
    	    $this->saveResource("settings.yml");	
    	}
    }
    
    public function saveFiles(){
    	$this->chat->save();
    	$this->exempt->save();
    	$this->ip->save();
    }
    
    public function updateFiles(){
    	if(!$this->getResource("settings.yml")->get("version") === $this->getDescription()->getVersion()){
    	    unlink($this->getResource("settings.yml"));
    	    $this->saveResource("settings.yml");
    	}
    }
    
    public function isAddressWhitelisted($address){
    	return $this->ip->exists($address);
    }
    
    public function isExempted($player){
    	return $this->exempt->exists($player);
    }
}
