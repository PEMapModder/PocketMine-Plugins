<?php

namespace advancedtext\task;

use advancedtext\AdvancedTextAPI;
use pocketmine\scheduler\PluginTask;

class AutoPopupTask extends PluginTask{

    public function __construct(AdvancedTextAPI $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onRun($currentTick){
        $messages = $this->getPlugin()->getConfig()->getNested("popup.messages");
        $key = array_rand($messages, 1);
        $message = $messages[$key];
    }
}
