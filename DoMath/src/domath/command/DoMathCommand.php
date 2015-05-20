<?php

namespace domath\command;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;

class DoMathCommand implements CommandExecutor{
    
    public function __construct(DoMathAPI $plugin){
        $this->plugin = $plugin;
        $this->getPlugin()->getCommand("domath")->setExecutor($this);
    }
    public function getPlugin(){
        return $this->plugin;
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "domath"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "add"){
                    return true;
                }
                if(strtolower($args[0]) === "divide"){
                    return true;
                }
                if(strtolower($args[0]) === "help"){
                    return true;
                }
                if(strtolower($args[0]) === "multiply"){
                    return true;
                }
                if(strtolower($args[0]) === "subtract"){
                    return true;
                }
                return false;
            }
            else{
                $sender->sendMessage("DoMath commands");
                $sender->sendMessage("/domath add -");
                $sender->sendMessage("/domath divide -");
                $sender->sendMessage("/domath help -");
                $sender->sendMessage("/domath multiply -");
                $sender->sendMessage("/domath subtract -");
            }
        }
    }
}
