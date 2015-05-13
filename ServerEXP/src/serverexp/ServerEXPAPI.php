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
        if(!file_exists($this->getDataFolder()."config.yml")){
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
