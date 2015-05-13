<?php

namespace serverpopups\task;

use pocketmine\scheduler\PluginTask;
use serverpopups\ServerPopupsAPI;

class AutoPopupTask extends PluginTask{

    public function __construct(ServerPopupsAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun($currentTick){
    
    }
}
