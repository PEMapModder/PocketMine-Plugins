<?php

namespace gearup;

use pocketmine\block\Block;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\inventory\PlayerInventory;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "gearup"){
            if(isset($args[0])){
                if($sender instanceof Player){
                    if($args[0] === "0"){
       
                    }
                    if($args[0] === "1"){
 
                    }
                    if($args[0] === "2"){
 
                    }
                    if($args[0] === "3"){
                      
                    }
                    if($args[0] === "4"){

                    }
                    if($args[0] === "5"){
                  
                    }
                }
                else{
                    $sender->sendMessage("§cPlease run this command in-game.");
                }
            }
        }
    }
}
