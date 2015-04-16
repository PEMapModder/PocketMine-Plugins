<?php

namespace newcurrency;

use newcurrency\NewCurrencyListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public $account;
    
    public function onEnable(){
    	if(!is_dir($this->getDataFolder())){
    	    mkdir($this->getDataFolder());
    	}
    	$this->createFiles();
        $this->listener = new NewCurrencyListener($this);
        $this->getCommand("newcurrency")->setExecutor(new commands\NewCurrencyCommand($this));
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
	$this->account->save();
      	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
    	if(!file_exists($this->getDataFolder()."account.yml")){
    	    $this->account = new Config($this->getDataFolder()."account.yml", Config::YAML);
    	    $this->account->save();
    	}
    	if(!file_exists($this->getDataFolder()."settings.yml")){
    	    $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
    	    $this->settings->set("version", "1.0.0");
    	    $this->settings->save();
    	}
    }
    
    public function updateFiles(){
    	
    }
    
    public function getCurrencyName(){

    }
    
    public function getCurrencySymbol(){

    }
    
    public function getMinimumBalance(){

    }
    
    public function getMaximumBalance(){

    }
    
    public function getBalance($player){

    }
    
    public function getDefault(){

    }
    
    public function decreaseBalance($player, $amount){
        
    }
    
    public function increaseBalance($player, $amount){
        
    }
    
    public function setBalance($player, $amount){
        
    }
    
    public function isRegistered($player){

    }
    
    public function register($player){
        $this->account->set($player, $this->getDefault());
	$this->account->save();
    }
    
    public function unregister($player){
        $this->account->remove($player);
	$this->account->save();
    }
}
