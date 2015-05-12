<?php

namespace serverhelp;

use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class ServerHelpLoader extends PluginBase implements Listener{

    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
      	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onPlayerCommandPreprocess(PlayerCommandPreprocess $event){
        $command = explode(" ", strtolower($event->getMessage()));
        if($command[0] === "/help"){
          
        }
    }
}
