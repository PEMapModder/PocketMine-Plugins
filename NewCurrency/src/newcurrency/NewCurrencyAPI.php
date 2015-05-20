<?php

namespace newcurrency;

use newcurrency\command\NewCurrencyCommand;
use newcurrency\NewCurrencyListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public $accounts;
    
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
            if(!is_numeric($this->getConfig()->get("default"))){
            	$this->getConfig()->set("default", 100);
            }
        }
        else{
            $this->saveDefaultConfig();
        }
    	if(!file_exists($this->getDataFolder()."accounts.yml")){
    	    $this->account = new Config($this->getDataFolder()."accounts.yml", Config::YAML);
    	    $this->account->save();
    	}
    }
    public function getCurrencyName(){

    }
    public function getCurrencySymbol(){

    }
    public function getMinimumAmount(){

    }
    public function getMaximumAmount(){

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
    public function getAccounts(){
    	return $this->accounts;
    }
    public function getAccount(Player $player){
	return $this->getAccounts()->get(strtolower($player->getName()));
    }
    public function decreaseBalance(Player $player, $amount){
        $this->getAccounts()->set($this->getAccount($player), $this->getAccount($player) - $amount);
        $this->getAccounts()->save();
    }
    public function increaseBalance(Player $player, $amount){
        $this->getAccounts()->set($this->getAccount($player), $this->getAccount($player) + $amount);
        $this->getAccounts()->save();  
    }
    public function setBalance(Player $player, $amount){
        $this->getAccounts()->set($this->getAccount($player), $amount);
        $this->getAccounts()->save();
    }
}
