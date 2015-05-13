<?php

namespace effectspro\task;

use pocketmine\scheduler\PluginTask;

class AutoEffectTask extends PluginTask{
  
    public function __construct(EffectsProAPI $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
}
