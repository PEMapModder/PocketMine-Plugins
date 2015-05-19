<?php

namespace imanager;

use imanager\command\iManagerCommand;
use imanager\iManagerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class iManagerAPI extends PluginBase{

    public $chat;
    public $exempt;
    public $ip;

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

    public function getChatLog(){
    	return $this->chat;
    }
    
    public function getExempts(){
    	return $this->exempt;
    }
    
    public function getAddressWhitelist(){
    	return $this->ip;
    }
    
    public function isAddressWhitelisted($address){
    	return isset($this->getAddressWhitelist()->get($address));
    }
    
    public function isExempted(Player $player){
    	return isset($this->getExempts()->get(strtolower($player->getName())));
    }
    
    public function saveMessage(Player $player, $message){
    	$this->getChatLog()->set(date("H:i:s")." ".$player->getName().": ".$message);
    	$this->getChatLog()->save();
    }
}
