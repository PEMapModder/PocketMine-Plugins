<?php

namespace mytag\commands;

use mytag\MyTagAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class MyTagCommand implements CommandExecutor{

    public function __construct(MyTagAPI $plugin){
    	$this->plugin = $plugin;
    	$this->plugin->getCommand("mytag")->setExecutor($this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if($sender instanceof Player){
    	    if(strtolower($command->getName()) === "mytag"){
    	    	if(isset($args[0])){
    	    	    if(strtolower($args[0]) === "address"){
    	    	    	$sender->setNameTag($sender->getNameTag()." ".$sender->getAddress().":".$sender->getPort());
    	    	    	$this->tag->set(strtolower($sender->getName()), $sender->getNameTag());
    	    		$this->tag->save();
    	    	    	$sender->sendMessage("Your IP address and port number has been set on your tag.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "chat"){
    	    	    	//To-do
    	    	    }
    	    	    if(strtolower($args[0]) === "health"){
    	    	    	$sender->setNameTag($sender->getNameTag()." ".$sender->getHealth()."/".$sender->getMaxHealth());
    	    	    	$this->tag->set(strtolower($sender->getName()), $sender->getNameTag());
    	    		$this->tag->save();
    	    	    	$sender->sendMessage("Your health has been set on your tag.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "help"){
    	    	    	$sender->sendMessage("§bMyTag commands");
    	    	    	$sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    	$sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    	$sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    		$sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    	$sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    	$sender->sendMessage("§a/mytag money §c- §fShows the amount of money a player has");
    	    	    	$sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    	$sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    	$sender->sendMessage("§a/mytag set §c- §fSets the name tag to whatever is specified");
    	    	    	$sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "hide"){
    	    	    	$sender->setNameTag(null);
    	    	    	$this->tag->set(strtolower($sender->getName()), $sender->getNameTag());
    	    		$this->tag->save();
    	    	    	$sender->sendMessage("Your name tag has been hidden.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "money"){
    	    	    	//To-do
    	    	    }
    	    	    if(strtolower($args[0]) === "op"){
    	    	    	if($sender->isOp()){
    	    	    	    $sender->setNameTag($this->getConfig()->get("op-prefix")." ".$sender->getNameTag());
    	    	    	    $this->tag->set(strtolower($sender->getName()), $sender->getNameTag());
    	    		    $this->tag->save();
    	    	    	    $sender->sendMessage("Your OP status has been set on your tag.");
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("You need to be OP.");
    	    	    	}
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "restore"){
			$sender->setNameTag($sender->getName());
			$this->tag->set(strtolower($sender->getName()), $sender->getNameTag());
    	    		$this->tag->save();
    	    	    	$sender->sendMessage("Your default name tag has been restored.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "set"){
			//To-do
    	    	    }
    	    	    if(strtolower($args[0]) === "view"){
    	    	    	$sender->sendMessage("Your tag: ".$sender->getNameTag());
    	    	    	return true;
    	    	    }
    	    	    return false;
    	    	}
    	    	else{
    	    	    $sender->sendMessage("§bMyTag commands");
    	    	    $sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    $sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    $sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    	    $sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    $sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    $sender->sendMessage("§a/mytag money §c- §fShows the amount of money a player has");
    	    	    $sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    $sender->sendMessage("§a/mytag set §c- §fSets the name tag to whatever is specified");
    	    	    $sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	}
    	    }
    	}
    	else{
    	    $sender->sendMessage("§cPlease run this command in-game.");
    	}
    }
}
