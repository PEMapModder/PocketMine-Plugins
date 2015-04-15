<?php

namespace newcurrency\commands;

use newcurrency\NewCurrencyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class NewCurrencyCommand implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "newcurrency"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "give"){
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    return true;
                }
                if(strtolower($args[0]) === "info"){
                    return true;
                }
                if(strtolower($args[0]) === "send"){
                    return true;
                }
                if(strtolower($args[0]) === "take"){
                    return true;
                }
                if(strtolower($args[0]) === "view"){
                    return true; 
                }
                return false;
            }
            else{
                $sender->sendMessage("NewCurrency commands");
                return true;
            }
        }
    }
}
