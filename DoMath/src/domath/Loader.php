<?php

namespace domath;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "add"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] + $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." + ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Usage: ".$command->getUsage());
            }
        }
        if(strtolower($command->getName()) === "divide"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    if($args[1] === 0){
                        $sender->sendMessage(TextFormat::RED."Undefined value error: 0");
                    }
                    else{
                        $answer = $args[0] / $args[1];
                        $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." / ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                    }
                } 
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Usage: ".$command->getUsage()); 
            }
        }
        if(strtolower($command->getName()) === "multiply"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] * $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." * ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Usage: ".$command->getUsage());
            }
        }
        if(strtolower($command->getName()) === "subtract"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] - $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." - ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Usage: ".$command->getUsage());
            }
        }
        return true;
    }
}
