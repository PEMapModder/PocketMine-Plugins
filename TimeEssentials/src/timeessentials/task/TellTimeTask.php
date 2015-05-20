<?php

namespace timeessentials\task;

use pocketmine\scheduler\PluginTask;
use timeessentials\TimeEssentialsAPI;

class TellTimeTask extends PluginTask{

    public function __construct(TimeEssentialsAPI $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onRun($currentTick){
        $this->getPlugin()->getServer()->broadcastMessage(date("H:i:s"));
    }
}
