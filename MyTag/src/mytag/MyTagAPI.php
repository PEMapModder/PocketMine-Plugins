<?php

namespace mytag;

use mytag\MyTagListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class MyTagAPI extends PluginBase implements Listener{
    
    public $tag;
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
    	    $this->listener = new MyTagListener($this);
            $this->getCommand("mytag")->setExecutor(new commands\MyTagCommand($this));
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->tag->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        
    }
    
    public function updateFiles(){
        
    }
    
    public function saveNameTag($name){

    }
}
