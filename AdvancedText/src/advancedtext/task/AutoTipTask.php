<?php

namespace advancedtext\task;

use advancedtext\AdvancedTextAPI;
use pocketmine\scheduler\PluginTask;

class AutoTipTask extends PluginTask{

    public function __construct(AdvancedTextAPI $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onRun($currentTick){
        $messages = $this->getPlugin()->getConfig()->getNested("tip.messages");
        $key = array_rand($messages, 1);
        $message = $messages[$key];
    }
}
