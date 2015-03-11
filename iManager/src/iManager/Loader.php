<?php

namespace iManager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
	$this->getLogger()->info(TextFormat::GREEN."iManager enabled.");
    }
    
    public function onDisable(){
        $this->exempt->save();
        $this->getLogger()->info(TextFormat::RED."iManager disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	switch($command->getName()){
    	    case "addresslist":
    	    	$sender->sendMessage(TextFormat::YELLOW."IP address and port of all players that are currently online:");
    	    	foreach($sender->getServer()->getOnlinePlayers() as $players){  
    	    	    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED.$players->getAddress().TextFormat::BLUE.":".TextFormat::GREEN.$players->getPort());
                    return true;
    	    	}
    	    break;
            case "gamemodelist":
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
            break;
    	    case "healthlist":
    	    	$sender->sendMessage(TextFormat::YELLOW."Health of all players that are currently online:");
    	    	foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED.$players->getHealth().TextFormat::BLUE."/".TextFormat::GREEN.$players->getMaxHealth());
                    return true;
    	    	}
    	    break;
            case "imanager":
                if($sender->hasPermission("imanager.command.imanager")){
                    $sender->sendMessage("/addresslist: View everyone's IP address and port");
                    $sender->sendMessage("/gamemodelist: View everyone's gamemode");
                    $sender->sendMessage("/healthlist: View everyone's health");
                    $sender->sendMessage("/imanager: View all iManager commands");
                    $sender->sendMessage("/kickall: Kick all the players in the server");
                    $sender->sendMessage("/killall: Kill all the players in the server");
                    $sender->sendMessage("/opall: Give OP status to everyone in the server");
                    $sender->sendMessage("/oplist: Get a list of all online OPs");
                    $sender->sendMessage("/poslist: View everyone's location");
                    return true;
                }
                else{
                    $sender->sendMessage(TextFormat::RED."You don't have permissions to use this command.");
                    return true;
                }
            break;
    	    case "kickall":
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
    	    break;
    	    case "killall":
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
    	    break;
            case "opall":
                $sender->sendMessage(TextFormat::YELLOW."Opped everyone in the server.");
                foreach($sender->getServer()->getOnlinePlayers() as $players){
                    $players->setOp(true);
                }
            break;
    	    case "oplist":
    	    	$sender->sendMessage(TextFormat::YELLOW."OPs that are currently online:");
    	    	foreach($sender->getServer()->getOps() as $players){
    	    	    if($players->isOp()){
    	    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName());
                        return true;
    	    	    }
    	    	}
    	    break;
    	    case "poslist":
    	    	$sender->sendMessage(TextFormat::YELLOW."Location of all players that are currently online:");
    	    	foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.":".TextFormat::WHITE." X: ".TextFormat::RED.$players->getX().TextFormat::WHITE." Y: ".TextFormat::BLUE.$players->getY().TextFormat::WHITE." Z: ".TextFormat::GREEN.$players->getZ().TextFormat::WHITE." Level: ".TextFormat::LIGHT_PURPLE.$players->getLevel()->getName());
                    return true;
    	    	}
    	    break;
    	}
    }
}
