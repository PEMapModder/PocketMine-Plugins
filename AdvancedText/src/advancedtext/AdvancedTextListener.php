<?php

namespace advancedtext;

use advancedtext\AdvancedTextAPI;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\Listener;

class AdvancedTextListener implements Listener{

    public function __construct(ServerPopupsAPI $plugin){
        $this->plugin = $plugin;
        $this->getPlugin()->getServer()->getPluginManager()->registerEvents($this, $this->getPlugin());
    }
    public function getPlugin(){
        return $this->plugin;
    }
    public function onSignChange(SignChangeEvent $event){
        
    }
}
