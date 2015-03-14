<?php

namespace iManager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{
    
    public $chat;
    
    public $exempt;
    
    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
        $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->getLogger()->info(TextFormat::GREEN."iManager enabled.");
    }
    
    public function onDisable(){
    	$this->chat->save();
        $this->exempt->save();
        $this->getLogger()->info(TextFormat::RED."iManager disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if(strtolower($command->getName()) === "addresslist"){
    	    $sender->sendMessage(TextFormat::YELLOW."IP address and port of all players that are currently online:");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){  
    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED.$players->getAddress().TextFormat::BLUE.":".TextFormat::GREEN.$players->getPort());
                return true;
    	    }	
    	}
    	if(strtolower($command->getName()) === "gamemodelist"){
    	    $sender->sendMessage(TextFormat::YELLOW."Gamemode of all players that are currently online:");
            foreach($sender->getServer()->getOnlinePlayers() as $players){
                if($players->isAdventure()){
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::LIGHT_PURPLE."2");
                    return true;
                }
                elseif($players->isCreative()){
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::GREEN."1");
                    return true;
                }
                elseif($players->isSurvival()){
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::BLUE."0");
                    return true;
                }
                else{
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED."?");
                    return true;
                }
            }
    	}
    	if(strtolower($command->getName()) === "healthlist"){
    	    $sender->sendMessage(TextFormat::YELLOW."Health of all players that are currently online:");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED.$players->getHealth().TextFormat::BLUE."/".TextFormat::GREEN.$players->getMaxHealth());
                return true;
    	    }
    	}
    	if(strtolower($command->getName()) === "kickall"){
    	    $sender->sendMessage(TextFormat::YELLOW."Kicked everyone that is not an OP in the server.");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	if($players->hasPermission("imanager.exempt")){
                    $players->sendMessage("You are safe!");
                    return true;
                }
                else{
                    $players->kick();
                }
    	    }
    	}
    	if(strtolower($command->getName()) === "killall"){
    	    $sender->sendMessage(TextFormat::YELLOW."Killed everyone that is not an OP in the server.");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){               
    	    	if($players->hasPermission("imanager.exempt")){
                    $players->sendMessage("You are safe!");
                    return true;
                }
                else{
                    $players->kill();
                }
    	    }
    	}
    	if(strtolower($command->getName()) === "opall"){
    	    $sender->sendMessage(TextFormat::YELLOW."Opped everyone in the server.");
            foreach($sender->getServer()->getOnlinePlayers() as $players){
                $players->setOp(true);
            }	
    	}
    	if(strtolower($command->getName()) === "oplist"){
    	    $sender->sendMessage(TextFormat::YELLOW."OPs that are currently online:");
    	    foreach($sender->getServer()->getOps() as $players){
    	    	if($players->isOp()){
    	    	    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName());
                    return true;
    	    	}
    	    }	
    	}
    	if(strtolower($command->getName()) === "poslist"){
    	    $sender->sendMessage(TextFormat::YELLOW."Location of all players that are currently online:");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.":".TextFormat::WHITE." X: ".TextFormat::RED.$players->getX().TextFormat::WHITE." Y: ".TextFormat::BLUE.$players->getY().TextFormat::WHITE." Z: ".TextFormat::GREEN.$players->getZ().TextFormat::WHITE." Level: ".TextFormat::LIGHT_PURPLE.$players->getLevel()->getName());
                return true;	
    	    }
    	}
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	if($this->getConfig()->get("log-chat") === true){
    	    $this->chat->set($event->getPlayer()->getName(), $event->getMessage());
    	    $this->chat->save();
    	}
    }
}
