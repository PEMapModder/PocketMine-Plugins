<?php

namespace newcurrency;

use newcurrency\commands\NewCurrencyCommand;
use newcurrency\NewCurrencyListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public $account, $settings;
    
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
        if(!file_exists($this->getDataFolder()."config.yml")){
            $this->saveDefaultConfig();
        }
    	if(!file_exists($this->getDataFolder()."account.yml")){
    	    $this->account = new Config($this->getDataFolder()."account.yml", Config::YAML);
    	    $this->account->save();
    	    $this->getServer()->getLogger()->notice("Created new file: MyTag\\account.yml");
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
    
    public function getBalance($player){

    }
    
    public function decreaseBalance($player, $amount){
        
    }
    
    public function increaseBalance($player, $amount){
        
    }
    
    public function setBalance($player, $amount){
        
    }
    
    public function isRegistered($player){
	return $this->account->exists($player);
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
