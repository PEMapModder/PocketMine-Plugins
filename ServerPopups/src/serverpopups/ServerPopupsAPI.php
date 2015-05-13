<?php

namespace serverpopups;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use serverpopups\commands\ServerPopupsCommand;
use serverpopups\ServerPopupsListener;

class ServerPopupsAPI extends PluginBase{

    public $settings;
    
    public function onEnable(){
        $this->createFiles();
        $this->command = new ServerPopupsCommand($this);
        $this->listener = new ServerPopupsListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendPopup($message);
        }
    }
    
    public function broadcastTip($message){
    	foreach($this->getServer()->getOnlinePlayers() as $player){
    	    $player->sendTip($message);
    	}
    }
}
