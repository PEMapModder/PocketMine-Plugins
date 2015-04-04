<?php

namespace GearUp;

use pocketmine\block\Block;
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
                        $sender->getInventory()->setArmorItem(0, Block::Air);
                        $sender->getInventory()->setArmorItem(1, Block::Air);
                        $sender->getInventory()->setArmorItem(2, Block::Air);
                        $sender->getInventory()->setArmorItem(3, Block::Air);
                        $sender->sendMessage("You have cleared your armor.");
                    }
                    if($args[0] === "1"){
                        $sender->getInventory()->setArmorItem(0, Item::LeatherCap);
                        $sender->getInventory()->setArmorItem(1, Item::LeatherTunic);
                        $sender->getInventory()->setArmorItem(2, Item::LeatherPants);
                        $sender->getInventory()->setArmorItem(3, Item::LeatherBoots);
                        $sender->getInventory()->setItemInHand(Item::WoodenSword);
                        $sender->sendMessage("Equipped with full leather armor and a wooden sword.");
                    }
                    if($args[0] === "2"){
                        $sender->getInventory()->setArmorItem(0, Item::ChainHelmet);
                        $sender->getInventory()->setArmorItem(1, Item::ChainChestplate);
                        $sender->getInventory()->setArmorItem(2, Item::ChainLeggings);
                        $sender->getInventory()->setArmorItem(3, Item::ChainBoots);
                        $sender->getInventory()->setItemInHand(Item::StoneSword);
                        $sender->sendMessage("Equipped with full chain armor and a stone sword.");
                    }
                    if($args[0] === "3"){
                        $sender->getInventory()->setArmorItem(0, Item::IronHelmet);
                        $sender->getInventory()->setArmorItem(1, Item::IronChestplate);
                        $sender->getInventory()->setArmorItem(2, Item::IronLeggings);
                        $sender->getInventory()->setArmorItem(3, Item::IronBoots);
                        $sender->getInventory()->setItemInHand(Item::IronSword);
                        $sender->sendMessage("Equipped with full iron armor and an iron sword.");
                    }
                    if($args[0] === "4"){
                        $sender->getInventory()->setArmorItem(0, Item::GoldHelmet);
                        $sender->getInventory()->setArmorItem(1, Item::GoldChestplate);
                        $sender->getInventory()->setArmorItem(2, Item::GoldLeggings);
                        $sender->getInventory()->setArmorItem(3, Item::GoldBoots);
                        $sender->getInventory()->setItemInHand(Item::GoldSword);
                        $sender->sendMessage("Equipped with full golden armor and a golden sword.");
                    }
                    if($args[0] === "5"){
                        $sender->getInventory()->setArmorItem(0, Item::DiamondHelmet);
                        $sender->getInventory()->setArmorItem(1, Item::DiamondChestplate);
                        $sender->getInventory()->setArmorItem(2, Item::DiamondLeggings);
                        $sender->getInventory()->setArmorItem(3, Item::DiamondBoots);
                        $sender->getInventory()->setItemInHand(Item::DiamondSword);
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
        }
        return true;
    }
}
