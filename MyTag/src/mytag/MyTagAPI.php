<?php

namespace mytag;

use mytag\commands\MyTagCommand;
use mytag\MyTagListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class MyTagAPI extends PluginBase{
    
    public $settings, $tag;

    public function onEnable(){
        $this->saveFiles();
        $this->command = new MyTagCommand($this);
    	$this->listener = new MyTagListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."tag.yml")){
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
            $this->tag->save();
            $this->getServer()->getLogger()->notice("Created new file: MyTag\\tag.yml");
        }
    }

    public function getSavedNameTag($player){
        return $this->tag->get($player);
    }
    
    public function saveNameTag($player, $tag){
        $this->tag->set($player, $tag);
        $this->tag->save();
    }
}
