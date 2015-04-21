<?php

namespace damageedit;

use pocketmine\plugin\PluginBase;

class DamageEditLoader extends PluginBase{

    public function onEnable(){
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}
