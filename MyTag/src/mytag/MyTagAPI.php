<?php

namespace mytag;

use mytag\MyTagListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class MyTagAPI extends PluginBase{
    
    public $settings, $tag;

    public function onEnable(){
    	$this->listener = new MyTagListener($this);
        $this->getCommand("mytag")->setExecutor(new commands\MyTagCommand($this));
        $this->createFiles();
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	$this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    }
    
    public function onDisable(){
    	$this->saveFiles();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!is_dir($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
            $this->settings->set("version", $this->getDescription()->getVersion());
            $this->settings->setNested("enable.auto-set", true);
            $this->settings->set("op-prefix", "[Staff]");
            $this->settings->set("preferred-economy", "NewCurrency");
            $this->settings->save();
        }
        if(!file_exists($this->getDataFolder()."tag.yml")){
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
            $this->tag->save();
        }
    }

    public function updateFiles(){
        if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
            unlink($this->getDataFolder()."settings.yml");
            $this->createFiles();
        }
    }
    
    public function saveNameTag($player, $tag){
        $this->tag->set($player, $tag);
        $this->tag->save();
    }
}
