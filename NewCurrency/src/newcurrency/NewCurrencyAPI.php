<?php

namespace newcurrency;

use newcurrency\command\NewCurrencyCommand;
use newcurrency\NewCurrencyListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public $account;
    
    public function onEnable(){
    	$this->saveFiles();
    	$this->command = new NewCurrencyCommmand($this);
        $this->listener = new NewCurrencyListener($this);
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
            if(!is_bool($this->getConfig()->getNested("enable.auto-register"))){
            	$this->getConfig()->setNested("enable.auto-register", true);
            }
            if(!is_bool($this->getConfig()->getNested("enable.show-name"))){
            	$this->getConfig()->setNested("enable.show-name", true);
            }
            if(!is_bool($this->getConfig()->getNested("enable.show-symbol"))){
            	$this->getConfig()->setNested("enable.show-symbol", false);
            }
            if(!is_numeric($this->getConfig()->get("default"))){
            	$this->getConfig()->set("default", 100);
            }
        }
        else{
            $this->saveDefaultConfig();
        }
    	if(!file_exists($this->getDataFolder()."account.yml")){
    	    $this->account = new Config($this->getDataFolder()."account.yml", Config::YAML);
    	    $this->account->save();
    	}
    }
    
    public function getCurrencyName(){

    }
    
    public function getCurrencySymbol(){

    }
    
    public function getMinimumBalance(){

    }
    
    public function getMaximumBalance(){

    }
    
    public function isRegistered(Player $player){
	return $this->account->exists(strtolower($player->getName()));
    }
    
    public function setRegistered(Player $player, $value){
	if($value === true){
		
	}
	else{
		
	}
    }
    
    public function getBalance(Player $player){

    }
    
    public function decreaseBalance(Player $player, $amount){
        
    }
    
    public function increaseBalance(Player $player, $amount){
        
    }
    
    public function setBalance(Player $player, $amount){
        
    }
}
