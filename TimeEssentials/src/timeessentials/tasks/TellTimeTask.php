<?php

namespace timeessentials\tasks;

use pocketmine\scheduler\PluginTask;
use timeessentials\TimeEssentialsAPI;

class TellTimeTask extends PluginTask{

    public function __construct(TimeEssentialsAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun($currentTick){
        $this->plugin->getServer()->broadcastMessage(date("H:i:s"));
    }
}
