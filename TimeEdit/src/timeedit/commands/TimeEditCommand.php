<?php

namespace timeedit\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use timeedit\TimeEditAPI;

class TimeEditCommand implements CommandExecutor{

    public function __construct(TimeEditAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "timeedit"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("TimeEdit commands");
                    return true;
                }
                if(strtolower($args[0]) === "info"){
                    
                    return true;
                }
                if(strtolower($args[0]) === "lock"){
                    if(isset($args[1])){
                        
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "real"){
                    $sender->sendMessage("Current date: ".$this->plugin->getActualDate());
                    $sender->sendMessage("Current time: ".$this->plugin->getActualTime());
                    return true;
                }
                if(strtolower($args[0]) === "set"){
                    if(isset($args[1])){
                        
                    }
                    else{
                        $sender->sendMessage("");
                    }
                    return true;
                }
                if(strtolower($args[0]) === "unlock"){
                    if(isset($args[1])){
                        
                    }
                    else{
                        
                    }
                    return true;
                }
                return false;
            }
            else{
                $sender->sendMessage("TimeEdit commands");
                return true;
            }
        }
    }
}
