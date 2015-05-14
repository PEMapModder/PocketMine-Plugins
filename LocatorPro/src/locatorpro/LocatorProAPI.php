<?php

namespace locatorpro;

use locatorpro\command\LocatorProCommand;
use locatorpro\LocatorProListener;
use pocketmine\level\Location;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class LocatorProAPI extends PluginBase{
    
    public $pos, $settings;
    
    public function onEnable(){
    	$this->saveFiles();
    	$this->command = new LocatorProCommand($this);
    	$this->listener = new LocatorProListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(file_exists($this->getDataFolder()."config.yml")){

        }
        else{
            $this->saveDefaultConfig();
        }
        if(!file_exists($this->getDataFolder()."location.yml")){
            $this->location = new Config($this->getDataFolder()."location.yml", Config::YAML);
            $this->location->save();
        }
    }

    public function saveLocation($x, $y, $z, $yaw, $pitch, $level){
        
    }
}
