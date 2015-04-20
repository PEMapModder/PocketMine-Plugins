<?php

namespace itracker;

use itracker\iTrackerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class iTrackerAPI extends PluginBase{

    public $chat, $exempt, $ip, $settings;
    
    public function onEnable(){
    	$this->createFiles();
    	$this->openFiles();
    	$this->updateFiles();
    	$this->listener = new iManagerListener($this);
        $this->getCommand("imanager")->setExecutor(new commands\iManagerCommand($this));
	$this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}
