<?php

namespace timeessentials;

use pocketmine\plugin\PluginBase;
use timeessentials\command\TimeEssentialsCommand;
use timeessentials\TimeEssentialsListener;

class TimeEssentialsAPI extends PluginBase{

    public function onEnable(){
        $this->saveFiles();
        $this->command = new TimeEssentialsCommand($this);
        $this->listener = new TimeEssentialsListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(file_exists($this->getDataFolder()."config.yml")){
            
        }
        else{
            $this->saveDefaultConfig();
        }
    }
}
