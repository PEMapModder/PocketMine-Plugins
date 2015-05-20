<?php

namespace advancedtext\command;

use advancedtext\AdvancedTextAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;

class AdvancedTextCommand implements CommandExecutor{

    public function __construct(AdvancedTextAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getCommand("advancedtext")->setExecutor($this);
    }
    
    public function getPlugin(){
        return $this->plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "advancedtext"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "broadcastmessage"){
                    return true;
                }
                if(strtolower($args[0]) === "broadcastpopup"){
                    if(isset($args[1])){
                        $this->getPlugin()->broadcastPopup(implode(" ", array_slice($args, 1)));
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "broadcasttip"){
                    if(isset($args[1])){
                        $this->getPlugin()->broadcastTip(implode(" ", array_slice($args, 1)));
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("AdvancedText commands");
                    return true;
                }
                if(strtolower($args[0]) === "sendmessage"){
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
                $sender->sendMessage("AdvancedText commands");
                return true;
            }
        }
    }
}
