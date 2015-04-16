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
    	    @mkdir($this->getDataFolder());
            $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
            $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
            $this->ip = new Config($this->getDataFolder()."ip.txt", Config::ENUM);
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
    	$this->chat->save();
        $this->exempt->save();
        $this->ip->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
    	if(file_exists($this->getDataFolder()."settings.yml")){
    		
    	}
    	else{
    		
    	}
    }
    
    public function updateFiles(){
    	
    }
    
    public function isAddressWhitelisted($address){
    	return $this->ip->exists($address);
    }
    
    public function isExempted($player){
    	return $this->exempt->exists($player);
    }
}
