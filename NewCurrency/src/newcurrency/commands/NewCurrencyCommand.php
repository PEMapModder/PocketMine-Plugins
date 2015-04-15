<?php

namespace newcurrency\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class NewCurrencyCommand implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "newcurrency"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "give"){
                    
                }
                if(strtolower($args[0]) === "help"){
                    
                }
                if(strtolower($args[0]) === "info"){
                    
                }
                if(strtolower($args[0]) === "send"){
                    
                }
                if(strtolower($args[0]) === "take"){
                    
                }
                if(strtolower($args[0]) === "view"){
                    
                }
                return false;
            }
            else{
                
            }
        }
    }
}
