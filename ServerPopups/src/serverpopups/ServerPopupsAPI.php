<?php

namespace serverpopups;

use pocketmine\plugin\PluginBase;

class ServerPopupsAPI extends PluginBase{

    public function onEnable(){
      
    }
    
    public function onDisable(){
      
    }
    
    public function saveFiles(){
        
    }
    
    public function updateFiles(){
        
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $players){
            $players->sendPopup($message);
        }
    }
}
