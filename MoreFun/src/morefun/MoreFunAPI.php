<?php

namespace morefun;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class MoreFunAPI extends PluginBase{
  
    public $freeze = array();
    public $lock = array();
    
    public function onEnable(){
      
    }
    
    public function onDisable(){
      
    }
    
    public function getFrozenPlayers(){
      
    }
    
    public function getInventoryLockedPlayers(){
      
    }
    
    public function setPlayerFreeze(Player $player, $value){
        if($value === true){
          
        }
        else{
          
        }
    }
    
    public function setPlayerInventoryLock(Player $player, $value){
        if($value === true){
          
        }
        else{
          
        }
    }
}
