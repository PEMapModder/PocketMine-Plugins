<?php

namespace itracker;

use itracker\iTrackerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class iTrackerAPI extends PluginBase{
    
    public function onEnable(){
    	$this->listener = new iTrackerListener($this);
        $this->getCommand("itracker")->setExecutor(new commands\iTrackerCommand($this));
	$this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}
