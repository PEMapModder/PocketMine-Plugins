<?php

namespace globalshield;

use globalshield\GlobalShieldListener;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\plugin\PluginBase;

class GlobalShieldAPI extends PluginBase{
    
    public function onEnable(){
        $this->saveFiles();
        $this->listener = new GlobalShieldListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(!file_exists($this->getDataFolder()."config.yml")){
            $this->saveDefaultConfig();
        }
    }
    
    public function isItemBannedInLevel(Item $item, Level $level){
        return in_array($item->getId(), $this->getConfig()->getNested("level.".strtolower($level->getName())."items"));
    }
    
    public function isLevelProtected(Level $level){
        
    }
}
