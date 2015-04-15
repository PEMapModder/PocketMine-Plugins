<?php

namespace mytag;

use mytag\MyTagListener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class MyTagAPI extends PluginBase implements Listener{
    
    public $tag;
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->tag = new Config($this->getDataFolder()."tag.yml", Config::YAML);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
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
        
    }
    
    public function saveNameTag(Player $player){
        
    }
}
