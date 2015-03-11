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
        switch($command->getName()){
            case "add":
                if(isset($args[0]) && isset($args[1])){
                    $answer = $args[0] + $args[1];
                    $sender->sendMessage($args[0]." + ".$args[1]." = ".$answer);
                    return true;
                }
            break;
            case "divide":
                if(isset($args[0]) && isset($args[1])){
                    $answer = $args[0] / $args[1];
                    $sender->sendMessage($args[0]." / ".$args[1]." = ".$answer);
                    return true;
                }
            break;
            case "multiply":
                if(isset($args[0]) && isset($args[1])){
                    $answer = $args[0] * $args[1];
                    $sender->sendMessage($args[0]." * ".$args[1]." = ".$answer);
                    return true;
                }
            break;
            case "subtract":
                if(isset($args[0]) && isset($args[1])){
                    $answer = $args[0] - $args[1];
                    $sender->sendMessage($args[0]." - ".$args[1]." = ".$answer);
                    return true;
                }
            break;
        }
    }
}
