<?php

namespace mytag;

use mytag\MyTagListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class MyTagAPI extends PluginBase{
    
    public $tag;
    
    public function onEnable(){
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
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
    
    public function createFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->saveResource("settings.yml");
        }
        if(!file_exists($this->getDataFolder()."tag.yml")){
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
            $this->tag->save();
        }
    }
    
    public function saveFiles(){
        $this->tag->save();
    }
    
    public function updateFiles(){
        
    }
    
    public function saveNameTag($player, $tag){
        $this->tag->set($player, $tag);
        $this->tag->save();
    }
}
