<?php

namespace advancedtext;

use pocketmine\event\Listener;
use advancedtext\AdvancedTextAPI;

class AdvancedTextListener implements Listener{

    public function __construct(ServerPopupsAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
}
