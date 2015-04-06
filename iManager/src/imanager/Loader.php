<?php

namespace imanager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase implements Listener{

    public $chat;
    
    public $exempt;
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
            $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
	    $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->exempt->save();
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if(strtolower($command->getName()) === "server"){
    	    if(isset($args[0])){
    	    	if(strtolower($args[0]) === "addresslist"){

    	    	}
    	    	if(strtolower($args[0]) === "gamemodelist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "healthlist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "kickall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "killall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "moneylist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "opall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "oplist"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "poslist"){
    	    		
    	    	}
    	    	else{
    	    		
    	    	}
    	    }
    	    else{
    	    	$sender->sendMessage();
    	    }
    	}
    	if(strtolower($command->getName()) === "addresslist"){
    	    $sender->sendMessage(TextFormat::YELLOW."IP address and port of all players that are currently online:");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){  
    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED.$players->getAddress().TextFormat::BLUE.":".TextFormat::GREEN.$players->getPort());
    	    }	
    	}
    	if(strtolower($command->getName()) === "gamemodelist"){
    	    $sender->sendMessage(TextFormat::YELLOW."Gamemode of all players that are currently online:");
            foreach($sender->getServer()->getOnlinePlayers() as $players){
                if($players->isAdventure()){
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::LIGHT_PURPLE."2");
                }
                elseif($players->isCreative()){
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::GREEN."1");
                }
                elseif($players->isSurvival()){
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::BLUE."0");
                }
                else{
                    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED."?");
                }
            }
    	}
    	if(strtolower($command->getName()) === "healthlist"){
    	    $sender->sendMessage(TextFormat::YELLOW."Health of all players that are currently online:");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.": ".TextFormat::RED.$players->getHealth().TextFormat::BLUE."/".TextFormat::GREEN.$players->getMaxHealth());
    	    }
    	}
    	if(strtolower($command->getName()) === "kickall"){
    	    $sender->sendMessage(TextFormat::YELLOW."Kicked everyone that is not an OP in the server.");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	if($players->hasPermission("imanager.exempt")){
                    $players->sendMessage("You are safe!");
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
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	if($players->isOp()){
    	    	    $sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName());
    	    	}
    	    }	
    	}
    	if(strtolower($command->getName()) === "poslist"){
    	    $sender->sendMessage(TextFormat::YELLOW."Location of all players that are currently online:");
    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	$sender->sendMessage(TextFormat::YELLOW."> ".TextFormat::WHITE.$players->getName().TextFormat::YELLOW.":".TextFormat::WHITE." X: ".TextFormat::RED.$players->getX().TextFormat::WHITE." Y: ".TextFormat::BLUE.$players->getY().TextFormat::WHITE." Z: ".TextFormat::GREEN.$players->getZ().TextFormat::WHITE." Level: ".TextFormat::LIGHT_PURPLE.$players->getLevel()->getName());
    	    }
    	}
        return true;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	
    }
    
    public function onPlayerPreLogin(PlayerPreLoginEvent $event){
    	
    }
}
