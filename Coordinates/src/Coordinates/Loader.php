<?php

namespace Coordinates;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."Coordinates enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Coordinates disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "getpos"){
                if(isset($args[0])){
                    $target = $sender->getServer()->getPlayer($args[0]);
                    if($target != null){
                        $sender->sendMessage($target->getName()."'s location:");
                        $sender->sendMessage("X: ".$target->getX()." Y: ".$target->getY()." Z: ".$target->getZ()." Level: ".$target->getLevel()->getName());
                    }
                    else{
                        $sender->sendMessage("Please specify a valid player.");
                    }
                }
                else{
                    $sender->sendMessage("X: ".$sender->getX()." Y: ".$sender->getY()." Z: ".$sender->getZ()." Level: ".$sender->getLevel()->getName());
                }
            }
        }
        else{
            $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
        }
        return true;
    }
}
