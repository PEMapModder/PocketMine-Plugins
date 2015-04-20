<?php

namespace itracker;

use itracker\iTrackerAPI;
use pocketmine\event\Listener;

class iTrackerListener implements Listener{

    public function __construct(iTrackerAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
}
