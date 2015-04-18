<?php

namespace timeedit\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use timeedit\TimeEditAPI;

class TimeEditCommand implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $command, $label, array $args{
        if(strtolower($command->getName()) === "timeedit"){
        
        }
    }
}
