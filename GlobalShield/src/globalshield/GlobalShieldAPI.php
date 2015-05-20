<?php

namespace globalshield;

use globalshield\GlobalShieldListener;
use pocketmine\level\Level;
use pocketmine\plugin\PluginBase;

class GlobalShieldAPI extends PluginBase{
    
    public function onEnable(){
        $this->saveFiles();
        $this->listener = new GlobalShieldListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(!file_exists($this->getDataFolder()."config.yml")){
            $this->saveDefaultConfig();
        }
    }
    
    public function isLevelProtected(Level $level){
        
    }
}
