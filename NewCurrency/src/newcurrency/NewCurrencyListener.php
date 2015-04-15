<?php

namespace newcurrency;

use newcurrency\NewCurrencyAPI;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

class NewCurrencyListener implements Listener{
    
    public function __construct(NewCurrencyAPI $plugin){
	$this->plugin = $plugin;
	$this->getPlugin()->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
    
    public function getPlugin(){
    	return $this->plugin;
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getPlugin()->isRegistered(strtolower($event->getPlayer()->getName()))){
            
        }
        else{
            if($this->getConfig()->get("enable")["auto-register"] === true){
            	$this->getPlugin()->register(strtolower($event->getPlayer()->getName()));
            	$this->getPlugin()->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to NewCurrency at NewCurrency\\account.yml");
            }
        }
    }
}
