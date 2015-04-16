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

    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->plugin->isRegistered(strtolower($event->getPlayer()->getName()))){
            
        }
        else{
            if($this->plugin->settings->getNested("enable.auto-register") === true){
            	$this->plugin->register(strtolower($event->getPlayer()->getName()));
            	$this->plugin->getServer()->getLogger()->notice("Registered ".$event->getPlayer()->getName()." to NewCurrency at NewCurrency\\account.yml");
            }
        }
    }
}
