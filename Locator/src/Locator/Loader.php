<?php

namespace Locator;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "getpos"){
                if(isset($args[0])){
                    if($sender->hasPermission("locator.command.getpos.other")){
                        $target = $sender->getServer()->getPlayer($args[0]);
                        if($target != null){
                            $sender->sendMessage($target->getName()."'s location:");
                            $sender->sendMessage("X: ".$target->getX());
                            $sender->sendMessage("Y: ".$target->getY());
                            $sender->sendMessage("Z: ".$target->getZ());
                            $sender->sendMessage("Level: ".$target->getLevel()->getName());
                            $sender->sendMessage("Face: ");
                        }
                        else{
                            $sender->sendMessage(TextFormat::RED."Please specify a valid player.");
                        }
                    }
                    else{
                        $sender->sendMessage(TextFormat::RED."You don't have permissions to use this command.");
                    }
                }
                else{
                    if($sender->hasPermission("locator.command.getpos.self")){
                        $sender->sendMessage("Your location:");
                        $sender->sendMessage("X: ".$sender->getX());
                        $sender->sendMessage("Y: ".$sender->getY());
                        $sender->sendMessage("Z: ".$sender->getZ());
                        $sender->sendMessage("Level: ".$sender->getLevel()->getName());
                        $sender->sendMessage("Face: ");
                    }
                    else{
                        $sender->sendMessage("§cYou don't have permissions to use this command.");
                    }
                }
            }
        }
        else{
            $sender->sendMessage("§cPlease run this command in-game.");
        }
        return true;
    }
}
