<?php

namespace advancedtext\task;

use advancedtext\AdvancedTextAPI;
use pocketmine\scheduler\PluginTask;

class AutoPopupTask extends PluginTask{

    public function __construct(AdvancedTextAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onRun($currentTick){
    
    }
}
