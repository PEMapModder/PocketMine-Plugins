<?php

namespace GearUp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\inventory\PlayerInventory;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "gear"){
            if(isset($args[0])){
                if($sender instanceof Player){
                    if($args[0] === "0"){
                        $sender->getInventory()->setArmorItem(0, 0);
                        $sender->getInventory()->setArmorItem(1, 0);
                        $sender->getInventory()->setArmorItem(2, 0);
                        $sender->getInventory()->setArmorItem(3, 0);
                        $sender->sendMessage("You have cleared your armor.");
                    }
                    if($args[0] === "1"){
                        $sender->getInventory()->setArmorItem(0, 298);
                        $sender->getInventory()->setArmorItem(1, 299);
                        $sender->getInventory()->setArmorItem(2, 300);
                        $sender->getInventory()->setArmorItem(3, 301);
                        $sender->getInventory()->setItemInHand(268);
                        $sender->sendMessage("Equipped with full leather armor and a wooden sword.");
                    }
                    if($args[0] === "2"){
                        $sender->getInventory()->setArmorItem(0, 302);
                        $sender->getInventory()->setArmorItem(1, 303);
                        $sender->getInventory()->setArmorItem(2, 304);
                        $sender->getInventory()->setArmorItem(3, 305);
                        $sender->getInventory()->setItemInHand(272);
                        $sender->sendMessage("Equipped with full chain armor and a stone sword.");
                    }
                    if($args[0] === "3"){
                        $sender->getInventory()->setArmorItem(0, 306);
                        $sender->getInventory()->setArmorItem(1, 307);
                        $sender->getInventory()->setArmorItem(2, 308);
                        $sender->getInventory()->setArmorItem(3, 309);
                        $sender->getInventory()->setItemInHand(267);
                        $sender->sendMessage("Equipped with full iron armor and an iron sword.");
                    }
                    if($args[0] === "4"){
                        $sender->getInventory()->setArmorItem(0, 314);
                        $sender->getInventory()->setArmorItem(1, 315);
                        $sender->getInventory()->setArmorItem(2, 316);
                        $sender->getInventory()->setArmorItem(3, 317);
                        $sender->getInventory()->setItemInHand(283);
                        $sender->sendMessage("Equipped with full golden armor and a golden sword.");
                    }
                    if($args[0] === "5"){
                        $sender->getInventory()->setArmorItem(0, 310);
                        $sender->getInventory()->setArmorItem(1, 311);
                        $sender->getInventory()->setArmorItem(2, 312);
                        $sender->getInventory()->setArmorItem(3, 313);
                        $sender->getInventory()->setItemInHand(276);
                        $sender->sendMessage("Equipped with full diamond armor and a diamond sword.");
                    }
                    else{
                        $sender->sendMessage("Please specify an existing set of equipment.");
                    }
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
                }
            }
            if(isset($args[1])){
                $target = $sender->getServer()->getPlayer($args[1]);
                if($target != null){
                    
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please specify a valid player.");
                }
            }
            else{
                
            }
        }
        return true;
    }
}
