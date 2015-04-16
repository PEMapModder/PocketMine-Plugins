<?php

namespace serverpopups;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class ServerPopupsAPI extends PluginBase{

    public $settings;
    
    public function onEnable(){
        $this->createFiles();
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
	    $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
            $this->settings->set("version", $this->getDescription()->getVersion());
            $this->settings->save();
        }
    }
    
    public function updateFiles(){
        if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
            unlink($this->getDataFolder()."settings.yml");
            $this->createFiles();
        }
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendPopup($message);
        }
    }
}
