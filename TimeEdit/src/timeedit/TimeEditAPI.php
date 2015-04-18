<?php

namespace timeedit;

use pocketmine\plugin\PluginBase;
use timeedit\TimeEditListener;

class TimeEditAPI extends PluginBase{

    public function onEnable(){
        $this->listener = new TimeEditListener($this);
        $this->getCommand("timeedit")->setExecutor(new commands\)
    }
    
    public function onDisable(){
      
    }
}
