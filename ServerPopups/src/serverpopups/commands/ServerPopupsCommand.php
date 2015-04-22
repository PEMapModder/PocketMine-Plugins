<?php

namespace serverpopups\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use serverpopups\ServerPopupsAPI;

class ServerPopupsCommand implements CommandExecutor{

    public function __construct(ServerPopupsAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getCommand("serverpopups")->setExecutor($this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "serverpopups"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "broadcast"){
                    if(isset($args[1])){
                        $this->plugin->broadcastPopup(array_slice($args, 2));
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("ServerPopups commands");
                    return true;
                }
                if(strtolower($args[0]) === "send"){
                    return true;
                }
                return false;
            }
            else{
                $sender->sendMessage("ServerPopups commands");
                return true;
            }
        }
    }
}
