<?php

namespace timeedit;

use pocketmine\plugin\PluginBase;
use timeedit\TimeEditListener;

class TimeEditAPI extends PluginBase{

    public function onEnable(){
        $this->listener = new TimeEditListener($this);
        $this->getCommand("timeedit")->setExecutor(new commands\TimeEditCommand($this));
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}
