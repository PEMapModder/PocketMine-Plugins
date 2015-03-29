<?php

namespace ServerStaff;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
            $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info(TextFormat::YELLOW."Your configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }

    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
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
