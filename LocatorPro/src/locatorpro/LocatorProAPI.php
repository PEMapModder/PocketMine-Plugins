<?php

namespace locatorpro;

use locatorpro\commands\LocatorProCommand;
use locatorpro\LocatorProListener;
use pocketmine\level\Location;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class LocatorProAPI extends PluginBase{
    
    public $pos, $settings;
    
    public function onEnable(){
    	$this->createFiles();
    	$this->openFiles();
    	$this->updateFiles();
    	$this->command = new LocatorProCommand($this);
    	$this->listener = new LocatorProListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->closeFiles();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."pos.yml")){
            $this->pos = new Config($this->getDataFolder()."pos.yml", Config::YAML);
            $this->pos->save();
            $this->getServer()->getLogger()->notice("Created new file: LocatorPro\\pos.yml");
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
            $this->settings->set("version", $this->getDescription()->getVersion());
            $this->settings->save();
            $this->getServer()->getLogger()->notice("Created new file: LocatorPro\\settings.yml");
        }
    }
    
    public function openFiles(){
        fopen($this->getDataFolder()."pos.yml", "a+");
        fopen($this->getDataFolder()."settings.yml", "r");
    }
    
    public function closeFiles(){
        fclose($this->getDataFolder()."pos.yml");
        fclose($this->getDataFolder()."settings.yml");
    }
    
    public function updateFiles(){
        if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
            unlink($this->getDataFolder()."settings.yml");
            $this->createFiles();
            $this->getServer()->getLogger()->warning("Updated file: LocatorPro\\settings.yml");
        }
    }
    
    public function saveLocation($x, $y, $z, $yaw, $pitch, $level){
        
    }
}
