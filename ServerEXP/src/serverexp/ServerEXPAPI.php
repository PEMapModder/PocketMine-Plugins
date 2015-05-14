<?php

namespace serverexp;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class ServerEXPAPI extends PluginBase{

    public function onEnable(){
        $this->saveFiles();
    }
    
    public function onDisable(){
      
    }
    
    public function saveFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(file_exists($this->getDataFolder()."config.yml")){
            if(!is_bool($this->getConfig()->getNested("enable.auto-register"))){
                $this->getConfig()->setNested("enable.auto-register", true);
            }
            if(!is_numeric($this->getConfig()->get("default"))){
                $this->getConfig()->set("default", 0);
            }
        }
        else{
            $this->saveDefaultConfig();
        }
    }
    
    public function getEXP(Player $player){
      
    }
    
    public function decreaseEXP(Player $player, $amount){
      
    }
    
    public function increaseEXP(Player $player, $amount){
      
    }
    
    public function setEXP(Player $player, $amount){
      
    }
}
