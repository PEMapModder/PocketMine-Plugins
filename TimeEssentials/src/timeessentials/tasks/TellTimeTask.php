<?php

namespace timeedit\tasks;

use pocketmine\scheduler\PluginTask;
use timeedit\TimeEditAPI;

class TellTimeTask extends PluginTask{

    public function __construct(TimeEditAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun($currentTick){
        $this->plugin->getServer()->broadcastMessage(date("H:i:s"));
    }
}