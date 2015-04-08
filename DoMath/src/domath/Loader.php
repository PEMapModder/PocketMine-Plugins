<?php

namespace domath;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "domath"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "add"){
                    return true;
                }
                if(strtolower($args[0]) === "divide"){
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    return true;
                }
                if(strtolower($args[0]) === "multiply"){
                    return true;
                }
                if(strtolower($args[0]) === "subtract"){
                    return true;
                }
                return false;
            }
            else{
                $sender->sendMessage("DoMath commands");
                $sender->sendMessage("/domath add -");
                $sender->sendMessage("/domath divide -");
                $sender->sendMessage("/domath help -");
                $sender->sendMessage("/domath multiply -");
                $sender->sendMessage("/domath subtract -");
            }
        }
    }
}
