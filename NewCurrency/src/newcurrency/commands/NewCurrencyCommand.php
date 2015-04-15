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
                
            }
            else{
                
            }
        }
    }
}
