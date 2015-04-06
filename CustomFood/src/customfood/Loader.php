<?php

namespace customfood;

use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onEntityRegainHealth(EntityRegainHealthEvent $event){
    
    }
    
    public function onPlayerItemConsume(PlayerItemConsumeEvent $event){
    
    }
}
