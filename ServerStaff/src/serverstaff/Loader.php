<?php

namespace serverstaff;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
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

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "staff"){
            foreach($this->getConfig()->get("staff") as $staff){
                $sender->sendMessage($staff);
            }
        }
        return true;
    }
}
