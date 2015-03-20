<?php

namespace ServerRules;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."ServerRules enabled.");
    }

    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."ServerRules disabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "rules"){
            foreach($this->getConfig()->get("rules") as $rules){
                $sender->sendMessage($rules);
            }
        }
        return true;
    }
}
