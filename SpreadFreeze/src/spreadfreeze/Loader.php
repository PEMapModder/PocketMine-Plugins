<?php

namespace spreadfreeze;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->createFiles();
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
    }
}
