<?php

namespace timeedit\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use timeedit\TimeEditAPI;

class TimeEditCommand implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "timeedit"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("TimeEdit commands");
                    return true;
                }
                if(strtolower($args[0]) === "info"){
                    
                }
                if(strtolower($args[0]) === "lock"){
                    
                }
                if(strtolower($args[0]) === "set"){
                    
                }
                if(strtolower($args[0]) === "unlock"){
                    
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
