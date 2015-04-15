<?php

namespace newcurrency;

use newcurrency\NewCurrencyAPI;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

class NewCurrencyListener implements Listener{
    
    public function __construct(NewCurrencyAPI $plugin){
	$this->plugin = $plugin;
	$this->plugin->getServer()->getPluginManager()->registerEvents($this, $this->getPlugin());
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->plugin->isRegistered(strtolower($event->getPlayer()->getName()))){
            
        }
        else{
            if($this->getResource("currency.yml")->get("auto-register") === true){
            	$this->plugin->register(strtolower($event->getPlayer()->getName()));
            }
        }
    }
}
