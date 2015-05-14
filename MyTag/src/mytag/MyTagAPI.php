<?php

namespace mytag;

use mytag\command\MyTagCommand;
use mytag\MyTagListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

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
        if(file_exists($this->getDataFolder()."config.yml")){
            if(!is_bool($this->getConfig()->getNested("enable.auto-set"))){
                $this->getConfig()->setNested("enable-auto-set", true);
            }
        }
        else{
            $this->saveDefaultConfig();
        }
        if(!file_exists($this->getDataFolder()."tag.yml")){
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
            $this->tag->save();
            $this->getServer()->getLogger()->notice("Created new file: MyTag\\tag.yml");
        }
    }

    public function getSavedNameTag(Player $player){
        return $this->tag->get(strtolower($player->getName()));
    }
    
    public function saveNameTag(Player $player){
        $this->tag->set(strtolower($player->getName()), $player->getNameTag());
        $this->tag->save();
    }
}
