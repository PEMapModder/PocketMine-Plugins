<?php

namespace serverpopups\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use serverpopups\ServerPopupsAPI;

class ServerPopupsCommand implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "serverpopups"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "broadcast"){
                    if(isset($args[1])){
                        
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    return true;
                }
                if(strtolower($args[0]) === "send"){
                    return true;
                }
                return false;
            }
            else{
                return true;
            }
        }
    }
}
