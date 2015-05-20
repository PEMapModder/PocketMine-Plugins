<?php

namespace advancedtext;

use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\Listener;
use advancedtext\AdvancedTextAPI;

class AdvancedTextListener implements Listener{

    public function __construct(ServerPopupsAPI $plugin){
        $this->plugin = $plugin;
        $this->getPlugin()->getServer()->getPluginManager()->registerEvents($this, $this->plugin);
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onSignChange(SignChangeEvent $event){
        
    }
}
