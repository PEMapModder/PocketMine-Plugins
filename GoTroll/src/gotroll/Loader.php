<?php

namespace gotroll;

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
        if(strtolower($command->getName()) === "troll"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "deop"){
                    $target = $sender->getServer()->getPlayer($args[1]);
                    if($target !== null){
                        $target->sendMessage();
                        $sender->sendMessage();
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "op"){
                    $target = $sender->getServer()->getPlayer($args[1]);
                    if($target !== null){
                        $target->sendMessage();
                        $sender->sendMessage(); 
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "spam"){
                    $target = $sender->getServer()->getPlayer($args[1]);
                    if($target !== null){
                        $target->sendMessage();
                        $sender->sendMessage();
                    }
                    else{
                        
                    }
                    return true;
                }
            }
            else{
                $sender->sendMessage("GoTroll commands:");
            }
        }
        return false;
    }
}
