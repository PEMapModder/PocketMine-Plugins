<?php

namespace Rewinder;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Rewinder enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Rewinder disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
            case "rewind":
                if($sender instanceof Player){

                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
                }
        }
    }
}
