<?php

namespace newcurrency;

use newcurrency\NewCurrencyListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public $account;
    
    public function onEnable(){
        $this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->account = new Config($this->getDataFolder()."account.yml", Config::YAML);
            $this->listener = new NewCurrencyListener($this);
            $this->getCommand("newcurrency")->setExecutor(new commands\NewCurrencyCommand($this));
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
      	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function getCurrencyName(){
        return $this->getConfig()->get("name");
    }
    
    public function getCurrencySymbol(){
        return $this->getConfig()->get("symbol");
    }
    
    public function getMinimumBalance(){
        return $this->getConfig()->get("balance");
    }
    
    public function getMaximumBalance(){
        return $this->getConfig()->get("balance");
    }
    
    public function getBalance($player){
        return $this->account->get($player);
    }
    
    public function getDefault(){
        return $this->getResource("currency.yml")->get("default");
    }
    
    public function decreaseBalance($amount, $player){
        
    }
    
    public function increaseBalance($amount, $player){
        
    }
    
    public function setBalance($amount, $player){
        
    }
    
    public function isRegistered($player){
        return $this->account->exists($player);
    }
    
    public function register($player){
        $this->account->set($player);
    }
    
    public function unregister($player){
        $this->account->remove($player);
    }
}
