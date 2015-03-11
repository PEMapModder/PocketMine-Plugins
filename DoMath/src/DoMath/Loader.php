<?php

namespace DoMath;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."DoMath enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."DoMath disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "add"){
            
        }
        if(strtolower($command->getName()) === "divide"){
            
        }
        if(strtolower($command->getName()) === "multiply"){
            
        }
        if(strtolower($command->getName()) === "subtract"){
            
        }
    }
}
