<?php

namespace timeessentials;

use pocketmine\event\Listener;
use timeessentials\TimeEssentialsAPI;

class TimeEssentialsListener implements Listener{

    public function __construct(TimeEditAPI $plugin){
        $this->plugin = $plugin;
        $this->getPlugin()->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
    public function getPlugin(){
        return $this->plugin;
    }
}
