<?php

namespace globalshield;

use globalshield\GlobalShieldListener;
use pocketmine\plugin\PluginBase;

class GlobalShieldLoader extends PluginBase{
    
    public function onEnable(){
        $this->saveFiles();
        $this->listener = new GlobalShieldListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        
    }
}
