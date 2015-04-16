<?php

namespace serverpopups;

use pocketmine\plugin\PluginBase;

class ServerPopupsAPI extends PluginBase{

    public function onEnable(){
      
    }
    
    public function onDisable(){
      
    }
    
    public function saveFiles(){
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->saveResource("settings.yml");
        }
    }
    
    public function updateFiles(){
        
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $players){
            $players->sendPopup($message);
        }
    }
}
