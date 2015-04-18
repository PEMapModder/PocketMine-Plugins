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
                    $sender->sendMessage("/timeedit help -");
                    $sender->sendMessage("/timeedit info -");
                    $sender->sendMessage("/timeedit lock -");
                    $sender->sendMessage("/timeedit real-");
                    $sender->sendMessage("/timeedit set -");
                    $sender->sendMessage("/timeedit unlock -");
                    return true;
                }
                if(strtolower($args[0]) === "info"){
                    
                    return true;
                }
                if(strtolower($args[0]) === "lock"){
                    if(isset($args[1])){
                        if(is_numeric($args[1])){
                            
                        }
                        else{
                            
                        }
                    }
                    else{
                        
                    }
                    return true;
                }
                if(strtolower($args[0]) === "real"){
                    $sender->sendMessage("Current real world:")
                    $sender->sendMessage("Date: ".$this->plugin->getActualDate());
                    $sender->sendMessage("Time: ".$this->plugin->getActualTime());
                    return true;
                }
                if(strtolower($args[0]) === "set"){
                    if(isset($args[1])){
                        if(is_numeric($args[1])){
                            if($args[1] > 24000 || $args[1] < 0){
                                $sender->sendMessage("§cTime value has to be greater than 0 and less than 24000.");
                            }
                            else{
                                $this->getServer()->getLevel()->setTime($args[1]);
                                $sender->sendMessage("Set level time to ".$args[1].".");
                            }
                        }
                        else{
                            $sender->sendMessage("§cTime value must be in numerical form.");
                        }
                    }
                    else{
                        $sender->sendMessage("§cPlease specify a time value.");
                    }
                    return true;
                }
                if(strtolower($args[0]) === "unlock"){
                    if(isset($args[1])){
                        if(is_numeric($args[1])){
                            
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
                $sender->sendMessage("TimeEdit commands");
                $sender->sendMessage("/timeedit help -");
                $sender->sendMessage("/timeedit info -");
                $sender->sendMessage("/timeedit lock -");
                $sender->sendMessage("/timeedit real-");
                $sender->sendMessage("/timeedit set -");
                $sender->sendMessage("/timeedit unlock -");
                return true;
            }
        }
    }
}
