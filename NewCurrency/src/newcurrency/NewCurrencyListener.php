<?php

namespace newcurrency;

use newcurrency\NewCurrencyAPI;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

class NewCurrencyListener implements Listener{
    
    public function __construct(NewCurrencyAPI $plugin){
	$this->plugin = $plugin;
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->plugin->isRegistered(strtolower($event->getPlayer()->getName()))){
            
        }
        else{
            
        }
    }
}
