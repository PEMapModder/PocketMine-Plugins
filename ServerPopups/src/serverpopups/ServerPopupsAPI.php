<?php

namespace serverpopups;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class ServerPopupsAPI extends PluginBase{

    public $settings;
    
    public function onEnable(){
      
    }
    
    public function onDisable(){
      
    }
    
    public function createFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
            $this->settings->set("version", $this->getDescription()->getVersion());
        }
    }
    
    public function saveFiles(){
        $this->settings->save();
    }
    
    public function updateFiles(){
        
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendPopup($message);
        }
    }
}
