<?php

namespace ServerStaff;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."ServerStaff enabled.");
    }

    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."ServerStaff disabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "staff"{

        }
    }
}