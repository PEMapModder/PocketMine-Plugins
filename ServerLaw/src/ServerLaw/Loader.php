<?php

namespace ServerLaw;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."ServerLaw enabled.");
    }
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."ServerLaw disabled.");
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "laws"){
            foreach($this->getConfig()->get("laws") as $laws){
                $sender->sendMessage($laws);
            }
        }
        return true;
    }
