<?php

namespace timeessentials;

use pocketmine\event\Listener;
use timeessentials\TimeEssentialsAPI;

class TimeEssentialsListener implements Listener{

    public function __construct(TimeEditAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
}
