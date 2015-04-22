<?php

namespace timeedit;

use pocketmine\plugin\PluginBase;
use timeedit\commands\TimeEditCommand;
use timeedit\TimeEditListener;

class TimeEditAPI extends PluginBase{

    public function onEnable(){
        $this->command = new TimeEditCommand($this);
        $this->listener = new TimeEditListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}
