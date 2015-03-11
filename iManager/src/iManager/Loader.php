<?php

namespace iManager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Server;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    @mkdir($this->getDataFolder());
    $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
	  $this->getLogger()->info(TextFormat::GREEN."iManager enabled.");
    }
    
    public function onDisable(){
    	$this->chat->save();
      $this->getLogger()->info(TextFormat::RED."iManager disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	  switch($command->getName()){
    	      case "addresslist":
    	    	    $sender->sendMessage("IP address and port of all players that are currently online:");
    	    	    foreach($sender->getServer()->getOnlinePlayers() as $players){  
    	    	        $sender->sendMessage("> ".$players->getName().": ".$players->getAddress().":".$players->getPort());
                    return true;
    	    	    }
    	      break;
    	      case "healthlist":
    	    	    $sender->sendMessage("Health of all players that are currently online:");
    	    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	        $sender->sendMessage("> ".$players->getName().": ".$players->getHealth()."/".$players->getMaxHealth());
                    return true;
    	    	    }
    	      break;
    	      case "kickall":
    	    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	        $players->kick();
    	    	}
    	      break;
    	      case "killall":
    	    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	        $players->kill();
    	    	    }
    	      break;
    	      case "oplist":
    	    	    $sender->sendMessage("OPs that are currently online:");
    	    	    foreach($sender->getServer()->getOps() as $players){
    	    	        $sender->sendMessage("> ".$players->getName());
                    return true;
    	    	    }
    	      break;
    	      case "poslist":
    	    	    $sender->sendMessage("Location of all players that are currently online:");
    	    	    foreach($sender->getServer()->getOnlinePlayers() as $players){
    	    	        $sender->sendMessage("> ".$players->getName().": X: ".$players->getX()." Y: ".$players->getY()." Z: ".$players->getZ()." Level: ".$players->getLevel());
                    return true;
    	    	    }
    	      break;
    	   }
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	
    }
}
