<?php

namespace advancedtext\task;

use advancedtext\AdvancedTextAPI;
use pocketmine\scheduler\PluginTask;

class AutoTipTask extends PluginTask{

    public function __construct(AdvancedTextAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun($currentTick){
      
    }
}
