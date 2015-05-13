<?php

namespace locatorpro\command;

use locatorpro\LocatorProAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class LocatorProCommand implements CommandExecutor{

    public function __construct(LocatorProAPI $plugin){
        $this->plugin = $plugin;
        $this->plugin->getCommand("locatorpro")->setExecutor($this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "locatorpro"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "back"){
                
                }
                if(strtolower($args[0]) === "pos"){
                    if(isset($args[1])){
                        if($sender->hasPermission("locatorpro.command.locatorpro.other")){
                            $target = $sender->getServer()->getPlayer($args[1]);
                            if($target !== null){
                                $sender->sendMessage($target->getName()."'s location:");
                                $sender->sendMessage("X: ".$target->getFloorX());
                                $sender->sendMessage("Y: ".$target->getFloorY());
                                $sender->sendMessage("Z: ".$target->getFloorZ());
                                $sender->sendMessage("Level: ".$target->getLevel()->getName());
                                $sender->sendMessage("Yaw: ".$target->getYaw());
                                $sender->sendMessage("Pitch: ".$target->getPitch());
                            }
                            else{
                                $sender->sendMessage("§cPlease specify a valid player.");
                            }
                        }
                        else{
                            $sender->sendMessage("§cYou don't have permissions to use this command.");
                        }
                    }
                    else{
                        if($sender instanceof Player){
                            if($sender->hasPermission("locatorpro.command.locatorpro.self")){
                                $sender->sendMessage("Your location:");
                                $sender->sendMessage("X: ".$sender->getFloorX());
                                $sender->sendMessage("Y: ".$sender->getFloorY());
                                $sender->sendMessage("Z: ".$sender->getFloorZ());
                                $sender->sendMessage("Level: ".$sender->getLevel()->getName());
                                $sender->sendMessage("Yaw: ".$sender->getYaw());
                                $sender->sendMessage("Pitch: ".$sender->getPitch());
                            }
                            else{
                                $sender->sendMessage("§cYou don't have permissions to use this command.");
                            }  
                        }
                        else{
                            $sender->sendMessage("§cPlease run this command in-game.");
                    }   
                }
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("§bLocatorPro commands");
                    $sender->sendMessage("/locatorpro back -")
                    $sender->sendMessage("/locatorpro help -");
                    $sender->sendMessage("/locatorpro pos -");
                    $sender->sendMessage("/locatorpro save -");
                    $sender->sendMessage("/locatorpro set -");
                }
                if(strtolower($args[0]) === "save"){
                
                }
                if(strtolower($args[0]) === "set"){
                
                }
            }
        }
    }
}
