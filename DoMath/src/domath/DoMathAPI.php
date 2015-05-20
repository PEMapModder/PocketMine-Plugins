<?php

namespace domath;

use domath\command\DoMathCommand;
use pocketmine\plugin\PluginBase;

class DoMathAPI extends PluginBase{
    
    public function onEnable(){
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}
