<?php

namespace SwitchIt;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "disable"){
            if(isset($args[0])){
                if($target != null){
                    $this->getPluginLoader()->disablePlugin($args[0]);
                    $sender->sendMessage("Disabled "."...");
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please specify an existing plugin, or check the case.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Please specify a valid plugin.");
            }
        }
        if(strtolower($command->getName()) === "enable"){
            if(isset($args[0])){
                if($target != null){
                    $this->getPluginLoader()->enablePlugin($args[0]);
                    $sender->sendMessage("Enabled "."...");
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please specify an existing plugin, or check the case.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Please specify a valid plugin.");
            }
        }
    }
}
