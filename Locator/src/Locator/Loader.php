<?php

namespace Locator;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."Locator enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Locator disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "getpos"){
                if(isset($args[0])){
                    $target = $sender->getServer()->getPlayer($args[0]);
                    if($target != null){
                        $sender->sendMessage($target->getName()."'s location:");
                        $sender->sendMessage("X: ".round($target->getX()));
                        $sender->sendMessage("Y: ".round($target->getY()));
                        $sender->sendMessage("Z: ".round($target->getZ()));
                        $sender->sendMessage("Level: ".$target->getLevel()->getName());
                    }
                    else{
                        $sender->sendMessage("Please specify a valid player.");
                    }
                }
                else{
                    $sender->sendMessage("Your location:");
                    $sender->sendMessage("X: ".round($sender->getX()));
                    $sender->sendMessage("Y: ".round($sender->getY()));
                    $sender->sendMessage("Z: ".round($sender->getZ()));
                    $sender->sendMessage("Level: ".$sender->getLevel()->getName());
                }
            }
        }
        else{
            $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
        }
        return true;
    }
}
