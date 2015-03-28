<?php

namespace AFKPlayer;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Enabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Disabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "afk"){
                if(isset($args[0])){
                    if(strtolower($args[0]) === "off"){
                        $sender->showPlayer($sender->getName());
                        $sender->sendMessage("You are not AFK anymore.");
                    }
                    if(strtolower($args[0]) === "on"){
                        $sender->hidePlayer($sender->getName());
                        $sender->sendMessage("You are now AFK. Run /afk off to turn it off.");
                    }
                    else{
                        $sender->sendMessage(TextFormat::RED."Please specify a valid sub-command.");
                    }
                }
                else{
                    $sender->sendMessage($command->getUsage());
                }
            }
        }
        else{
            $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
        }
        return true;
    }
}
