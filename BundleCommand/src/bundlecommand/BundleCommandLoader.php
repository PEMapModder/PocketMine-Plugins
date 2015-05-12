<?php

namespace bundlecommand;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class BundleCommandLoader extends PluginBase{

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "bundlecommand"){
          
        }
    }
}
