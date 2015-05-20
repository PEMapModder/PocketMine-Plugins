<?php

namespace globalshield;

use globalshield\GlobalShieldAPI;
use pocketmine\event\Listener;

class GlobalShieldListener implements Listener{

    public function __construct(GlobalShieldAPI $plugin){
        $this->plugin = $plugin;
        $this->getPlugin()->getServer()->getPluginManager()->registerEvents($this, $this->getPlugin());
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
}
