<?php

namespace planb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Loader extends PluginBase{
    
    public $backup;
    
    public function onEnable(){
    	  $this->saveDefaultConfig();
    	  if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	      @mkdir($this->getDataFolder());
            $this->pos = new Config($this->getDataFolder()."backup.yml", Config::YAML);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	  }
    	  else{
    	      $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDesrcription()->getFullName()."is outdated.");
    	      $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->pos->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "planb"){
            if(isset($args[0]){
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("PlanB commands");
                    $sender->sendMessage("/planb help -");
                    $sender->sendMessage("/planb reset -");
                }
                if(strtolower($args[0]) === "reset"){
                
                }
            }
        }
    }
}
