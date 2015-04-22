<?php

namespace serverpopups;

use pocketmine\event\Listener;
use serverpopups\ServerPopupsAPI;

class ServerPopupsListener implements Listener{

    public function __construct(ServerPopupsAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
}
