<?php

namespace spreadfreeze;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->createFiles();
        $this->openFiles();
        $this->updateFiles();
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->closeFiles();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
            $this->settings->set("version", $this->getDescription()->getVersion());
            $this->settings->save();
            $this->getServer()->getLogger()->notice("Created new file: SpreadFreeze\\settings.yml");
        }
    }
    
    public function openFiles(){
        fopen($this->getDataFolder()."settings.yml", "r");
    }
    
    public function closeFiles(){
        fclose($this->getDataFolder()."settings.yml");
    }
    
    public function updateFiles(){
        if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
            unlink($this->getDataFolder()."settings.yml");
            $this->createFiles();
            $this->getServer()->getLogger()->warning("Updated file: SpreadFreeze\\settings.yml");
        }
    }
}
