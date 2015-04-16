<?php

namespace locatorpro;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\Location;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class LocatorProAPI extends PluginBase{
    
    public $pos;
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->pos = new Config($this->getDataFolder()."pos.yml", Config::YAML);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDesrcription()->getFullName()."is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->pos->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        
    }
    
    public function updateFiles(){
        
    }
    
    public function saveLocation($x, $y, $z, $yaw, $pitch, $level){
        
    }
}
