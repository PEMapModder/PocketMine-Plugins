<?php

namespace Coordinates;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Main extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."Coordinates enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Coordinates disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
            case "getpos":
                if($sender instanceof Player){
                    $posX = $sender->getFloorX();
                    $posY = $sender->getFloorY();
                    $posZ = $sender->getFloorZ();
                    $level = $sender->getLevel()->getName();
                    $sender->sendMessage("x: ".$posX." y: ".$posY." z: ".$posZ." Level: ".$level);
                    return true;
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
                }
        }
    }
}
