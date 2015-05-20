<?php

namespace effectspro;

use effectspro\task\AutoEffectTask;
use pocketmine\plugin\PluginBase;

class EffectsProAPI extends PluginBase{

    public function onEnable(){
        $this->saveFiles();
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
}
