<?php

namespace advancedtext\task;

use advancedtext\AdvancedTextAPI;
use pocketmine\scheduler\PluginTask;

class AutoMessageTask extends PluginTask{

    public function __construct(AdvancedTextAPI $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
        $this->getPlugin()->getServer()->getScheduler()->scheduleRepeatingTask($this, );
    }
    public function getPlugin(){
        return $this->plugin;
    }
    public function onRun($currentTick){
        $message = $this->getPlugin()->getConfig()->getNested("message.messages");
        $key = array_rand($message, 1);
        $message = $messages[$key];
    }
}
