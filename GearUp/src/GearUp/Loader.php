<?php

namespace GearUp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."GearUp enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."GearUp disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "gear"){
            if(isset($args[0])){
                
            }
            else{
                
            }
        }
        return true;
    }
}
