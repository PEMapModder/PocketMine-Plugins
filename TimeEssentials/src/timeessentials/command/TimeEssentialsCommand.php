<?php

namespace timeessentials\command;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use timeessentials\TimeEssentialsAPI;

class TimeEditCommand implements CommandExecutor{

    public function __construct(TimeEssentialsAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getCommand("timeessentials")->setExecutor($this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "timeessentials"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("TimeEssentials commands");
                    $sender->sendMessage("/timeessentials help -");
                    $sender->sendMessage("/timeessentials info -");
                    $sender->sendMessage("/timeessentials lock -");
                    $sender->sendMessage("/timeessentials real-");
                    $sender->sendMessage("/timeessentials set -");
                    $sender->sendMessage("/timeessentials unlock -");
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
                    $sender->sendMessage("§eCurrent real world time:");
                    $sender->sendMessage("Date: ".date("Y-m-d"));
                    $sender->sendMessage("Time: ".date("H:i:s"));
                    return true;
                }
                if(strtolower($args[0]) === "set"){
                    if(isset($args[1])){
                        if(is_numeric($args[1])){
                            if(isset($args[2])){
                                $level = $this->plugin->getServer()->getLevelByName($args[2]);
                                if($level !== null){
                                    if($args[1] > 24000){
                                        $sender->sendMessage("§cTime value has to be less than 24000.");
                                    }
                                    elseif($args[1] < 0){
                                        $sender->sendMessage("§cTime value has to be greater than 0.");
                                    }
                                    else{
                                        $this->plugin->getServer()->getLevelByName($level)->setTime($args[1]);
                                        $sender->sendMessage("Set level time to ".$args[1]." on level ".$level->getName());
                                    }
                                }
                                else{
                                    $sender->sendMessage("§cPlease specify a valid level.");
                                }
                            }
                            else{
                                if($sender instanceof Player){
                                    if($args[1] > 24000){
                                        $sender->sendMessage("§cTime value has to be less than 24000.");
                                    }
                                    elseif($args[1] < 0){
                                        $sender->sendMessage("§cTime value has to be greater than 0.");
                                    }
                                    else{
                                        $sender->getLevel()->setTime($args[1]);
                                        $sender->sendMessage("Set level time to ".$args[1].".");
                                    }
                                }
                                else{
                                    $sender->sendMessage("§cPlease run this command in-game.");
                                }
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
                $sender->sendMessage("TimeEssentials commands");
                $sender->sendMessage("/timeessentials help -");
                $sender->sendMessage("/timeessentials info -");
                $sender->sendMessage("/timeessentials lock -");
                $sender->sendMessage("/timeessentials real-");
                $sender->sendMessage("/timeessentials set -");
                $sender->sendMessage("/timeessentials unlock -");
                return true;
            }
        }
    }
}
