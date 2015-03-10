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
            switch($command->getName()){
                case "getpos":
                    if($sender->hasPermission("coordinates.command.getpos.self")){
                        $sender->sendMessage("X: ".$sender->getX()." Y: ".$sender->getY()." Z: ".$sender->getZ()." Level: ".$sender->getLevel()->getName());
                        return true;
                    }
                    elseif($sender->hasPermission("coordinates.command.getpos.other")){
                        if(isset($arg[0])){
                            $target = $sender->getServer()->getPlayer(strtolower($args[0]));
                            if($target != null){
                                $sender->sendMessage($args[0]."'s location:"); 
                                $sender->sendMessage("X: ".$target->getX()." Y: ".$target->getY()." Z: ".$target->getZ()." Level: ".$target->getLevel()->getName());
                                return true;
                            }
                            else{
                                $sender->sendMessage("Please specify a valid player.");
                                return true;
                            }
                        }
                        else{
                            $sender->sendMessage($command->getUsage());
                            return true;
                        }
                    }
                break;
            }
        }
    }
}
