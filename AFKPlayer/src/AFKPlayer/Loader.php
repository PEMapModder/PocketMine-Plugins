<?php

namespace AFKPlayer;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."AFKPlayer enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."AFKPlayer disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "afk"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "off"){
                    $sender->sendMessage();
                }
                if(strtolower($args[0]) === "on"){
                    $sender->sendMessage();
                }
                else{
                    
                }
            }
            else{
                
            }
        }
    }
}
