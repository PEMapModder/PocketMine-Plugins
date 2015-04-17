<?php

namespace newcurrency;

use newcurrency\NewCurrencyListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public $account, $settings;
    
    public function onEnable(){
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
    	if(!file_exists($this->getDataFolder())){
    	    mkdir($this->getDataFolder());
    	}
    	if(!file_exists($this->getDataFolder()."account.yml")){
    	    $this->account = new Config($this->getDataFolder()."account.yml", Config::YAML);
    	    $this->account->save();
    	    $this->getServer()->getLogger()->notice("Created new file: MyTag\\account.yml");
    	}
    	if(!file_exists($this->getDataFolder()."settings.yml")){
	    $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
	    $this->settings->set("version", $this->getDescription()->getVersion());
	    $this->settings->setNested("enable.auto-register", true);
	    $this->settings->setNested("enable.name", true);
	    $this->settings->setNested("enable.symbol", false);
	    $this->settings->set("default", 100);
	    $this->settings->set("name", "coins");
	    $this->settings->set("symbol", "$");
	    $this->settings->save();
	    $this->getServer()->getLogger()->notice("Created new file: NewCurrency\\settings.yml");
    	}
    }
    
    public function openFiles(){
        fopen($this->getDataFolder()."account.yml");
        fopen($this->getDataFolder()."settings.yml");
    }
        
    public function closeFiles(){
        fclose($this->getDataFolder()."account.yml");
        fclose($this->getDataFolder()."settings.yml");
    }
    
    public function updateFiles(){
    	if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
    	    unlink($this->getDataFolder()."settings.yml");
    	    $this->createFiles();
    	    $this->getServer()->getLogger()->warning("Updated file: MyCurrency\\settings.yml");
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
