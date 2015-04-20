<?php

namespace itracker\commands;

use itracker\iTrackerAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;

class iTrackerCommand implements CommandExecutor{

    public function __construct(iTrackerAPI $plugin){
        $this->plugin = $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "itracker"){
            if(isset($args[0])){
                
            }
            else{
                
            }
        }
    }
}
