<?php

namespace imanager;

use imanager\command\iManagerCommand;
use imanager\iManagerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class iManagerAPI extends PluginBase{

    public $chat;
    public $exempts;
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
    	if(!file_exists($this->getDataFolder()."exempts.txt")){
    	    $this->exempt = new Config($this->getDataFolder()."exempts.txt", Config::ENUM);
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
    	return $this->exempts;
    }
    
    public function getAddressWhitelist(){
    	return $this->ip;
    }
    
    public function isAddressWhitelisted($address){
    	return $this->getAddressWhitelist()->get($address);
    }
    
    public function isExempted(Player $player){
    	return $this->getExempts()->get(strtolower($player->getName()));
    }
    
    public function saveMessage(Player $player, $message){
    	$this->getChatLog()->set(date("H:i:s")." ".$player->getName().": ".$message);
    	$this->getChatLog()->save();
    }
}
