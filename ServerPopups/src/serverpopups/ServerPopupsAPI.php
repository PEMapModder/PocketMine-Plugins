<?php

namespace serverpopups;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class ServerPopupsAPI extends PluginBase{

    public function onEnable(){
      
    }
    
    public function onDisable(){
      
    }
    
    public function createFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->saveResource("settings.yml");
        }
    }
    
    public function saveFiles(){
        
    }
    
    public function updateFiles(){
        
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendPopup($message);
        }
    }
}
