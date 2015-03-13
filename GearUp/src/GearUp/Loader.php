<?php

namespace GearUp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."GearUp enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."GearUp disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "gear"){
            if(isset($args[0])){
                if($sender instanceof Player){
                    if($args[0] === "0"){
                        $sender->getInventory()->setBoots(0);
                        $sender->getInventory()->setChestplate(0);
                        $sender->getInventory()->setHelmet(0);
                        $sender->getInventory()->setLeggings(0);
                        $sender->sendMessage("");
                    }
                    if($args[0] === "1"){
                        $sender->getInventory()->setBoots(301);
                        $sender->getInventory()->setChestplate(299);
                        $sender->getInventory()->setHelmet(298);
                        $sender->getInventory()->setLeggings(300);
                        $sender->getInventory()->setItemInHand(268);
                        $sender->sendMessage("");
                    }
                    if($args[0] === "2"){
                        $sender->getInventory()->setBoots(305);
                        $sender->getInventory()->setChestplate(303);
                        $sender->getInventory()->setHelmet(302);
                        $sender->getInventory()->setLeggings(304);
                        $sender->getInventory()->setItemInHand(272);
                        $sender->sendMessage("");
                    }
                    if($args[0] === "3"){
                        $sender->getInventory()->setBoots(309);
                        $sender->getInventory()->setChestplate(307);
                        $sender->getInventory()->setHelmet(306);
                        $sender->getInventory()->setLeggings(308);
                        $sender->getInventory()->setItemInHand(267);
                        $sender->sendMessage("");
                    }
                    if($args[0] === "4"){
                        $sender->getInventory()->setBoots(317);
                        $sender->getInventory()->setChestplate(315);
                        $sender->getInventory()->setHelmet(314);
                        $sender->getInventory()->setLeggings(316);
                        $sender->getInventory()->setItemInHand(283);
                        $sender->sendMessage("");
                    }
                    if($args[0] === "5"){
                        $sender->getInventory()->setBoots(313);
                        $sender->getInventory()->setChestplate(311);
                        $sender->getInventory()->setHelmet(310);
                        $sender->getInventory()->setLeggings(312);
                        $sender->getInventory()->setItemInHand(276);
                        $sender->sendMessage("");
                    }
                    else{
                        $sender->sendMessage("");
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
