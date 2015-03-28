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
                $target = $this->getPluginLoader($args[0]); 
                if($target != null){
                    $target->disablePlugin($target);
                    $sender->sendMessage("disabled!");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Invalid plugin name, check the name case.");
            }
        }
        if(strtolower($command->getName()) === "enable"){
            if(isset($args[0])){
                $target = $this->getPluginLoader($args[0]);
                if($target != null){
                    $target->enablePlugin($target);
                    $sender->sendMessage("enabled!");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."Invalid plugin name, check the name case.");
            }
        }
    }
}
