<?php

namespace serverpopups\command;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use advancedtext\AdvancedTextAPI;

class ServerPopupsCommand implements CommandExecutor{

    public function __construct(AdvancedTextAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getCommand("advancedtext")->setExecutor($this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "advancedtext"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "broadcastpopup"){
                    if(isset($args[1])){
                        $this->plugin->broadcastPopup(implode(" ", array_slice($args, 1)));
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "broadcasttip"){
                    if(isset($args[1])){
                        $this->plugin->broadcastTip(implode(" ", array_slice($args, 1)));
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("ServerPopups commands");
                    return true;
                }
                if(strtolower($args[0]) === "sendpopup"){
                    if(isset($args[1])){
                        if(isset($args[2])){
                            
                        }
                        else{
                            
                        }
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "sendtip"){
                    if(isset($args[1])){
                        if(isset($args[2])){
                            
                        }
                        else{
                            
                        }
                    }
                    else{
                        
                    }
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
