<?php

namespace ServerHelp;

use pocketmine\event\player\PlayerCommandPreProcessEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info(TextFormat::YELLOW."Your configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
    }

    public function onPlayerCommandPreProcess(PlayerPreProcessEvent $event){
        if(strtolower($event->getMessage()) === "/help"){
            
        }
    }
}
