<?php

namespace AFKPlayer;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."AFKPlayer enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."AFKPlayer disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "afk"){
                if(isset($args[0])){
                    if(strtolower($args[0]) === "off"){
                        $sender->sendMessage("You are not AFK anymore.");
                    }
                    if(strtolower($args[0]) === "on"){
                        $sender->sendMessage("You are now AFK. Run /afk off to turn it off.");
                    }
                    else{
                        $sender->sendMessage($command->getUsage());
                    }
                }
                else{
                    $sender->sendMessage($command->getUsage());
                }
            }
        }
        else{
            $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
        }
        return true;
    }
}
