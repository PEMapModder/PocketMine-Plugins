<?php

namespace imanager;

use imanager\iManagerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class iManagerAPI extends PluginBase{

    public $chat, $exempt, $ip, $settings;

    public function onEnable(){
    	$this->createFiles();
    	$this->listener = new iManagerListener($this);
        $this->getCommand("imanager")->setExecutor(new commands\iManagerCommand($this));
	$this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
    	if(!file_exists($this->getDataFolder())){
    	    mkdir($this->getDataFolder());
    	}
    	if(!file_exists($this->getDataFolder()."chat.txt")){
    	    $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
    	    $this->chat->save();
    	    $this->getServer()->getLogger()->notice("Created new file: iManager\\chat.txt");
    	}
    	if(!file_exists($this->getDataFolder()."exempt.txt")){
    	    $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
    	    $this->exempt->save();
    	    $this->getServer()->getLogger()->notice("Created new file: iManager\\exempt.txt");
    	}
    	if(!file_exists($this->getDataFolder()."ip.txt")){
    	    $this->ip = new Config($this->getDataFolder()."ip.txt", Config::ENUM);
    	    $this->ip->save();
    	    $this->getServer()->getLogger()->notice("Created new file: iManager\\ip.txt");
    	}
    	if(!file_exists($this->getDataFolder()."settings.yml")){
    	    $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
    	    $this->settings->set("version", $this->getDescription()->getVersion());
    	    $this->settings->setNested("enable.ip-whitelist", false);
    	    $this->settings->setNested("enable.log-commands", true);
    	    $this->settings->setNested("enable.save-chat", true);
    	    $this->settings->set("preferred-economy", "NewCurrency");
    	    $this->settings->save();
    	    $this->getServer()->getLogger()->notice("Created new file: iManager\\settings.yml");
    	}
    }
    
    public function openFiles(){
        fopen($this->getDataFolder()."chat.txt", "a");
        fopen($this->getDataFolder()."exempt.txt", "a+");
        fopen($this->getDataFolder()."ip.txt", "a+");
        fopen($this->getDataFolder()."settings.yml", "r");
    }
        
    public function closeFiles(){
        fclose($this->getDataFolder()."chat.txt");
        fclose($this->getDataFolder()."exempt.txt");
        fclose($this->getDataFolder()."ip.txt");
        fclose($this->getDataFolder()."settings.yml");
    }
    
    public function updateFiles(){
    	if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
    	    unlink($this->getDataFolder."settings.yml");
    	    $this->createFiles();
    	    $this->getServer()->getLogger()->warning("Updated file: iManager\\settings.yml");
    	}
    }
    
    public function isAddressWhitelisted($address){
    	return $this->ip->exists($address);
    }
    
    public function isExempted($player){
    	return $this->exempt->exists($player);
    }
}
