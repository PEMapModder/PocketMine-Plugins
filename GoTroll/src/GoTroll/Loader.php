<?php

namespace GoTroll;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."GoTroll enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."GoTroll disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "troll"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "deop"){
                    $target = strtolower($sender->getServer()->getPlayer($args[1]));
                    if($target != null){
                        
                    }
                    else{
                        
                    }
                }
                if(strtolower($args[0]) === "op"){
                    $target = strtolower($sender->getServer()->getPlayer($args[1]));
                    if($target != null){
                        
                    }
                    else{
                        
                    }
                }
                if(strtolower($args[0]) === "spam"){
                    $target = strtolower($sender->getServer()->getPlayer($args[1]));
                    if($target != null){
                        
                    }
                    else{
                        
                    }
                }
            }
            else{
                $sender->sendMessage("/troll spam");
            }
        }
        return true;
    }
}
