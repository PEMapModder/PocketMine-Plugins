<?php

namespace mytag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{
    
    public $data;
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->data = new Config($this->getDataFolder()."data.yml", Config::YAML);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->data->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if($sender instanceof Player){
    	    if(strtolower($command->getName()) === "mytag"){
    	    	if(isset($args[0])){
    	    	    if(strtolower($args[0]) === "address"){
    	    	    	$sender->setNameTag($sender->getNameTag()."\n".$sender->getAddress().":".$sender->getPort());
    	    	    	$sender->sendMessage("Your IP address and port number has been set on your tag.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "chat"){
    	    	    	//To-do
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "health"){
    	    	    	$sender->setNameTag($sender->getNameTag()."\n".$sender->getHealth()."/".$sender->getMaxHealth());
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
    	    	    	$sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    	    	$sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    	$sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    	$sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "hide"){
    	    	    	$sender->setNameTag(null);
    	    	    	$sender->sendMessage("Your name tag has been hidden.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "money"){
    	    	    	//To-do
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "op"){
    	    	    	if($sender->isOp()){
    	    	    	    $sender->setNameTag($this->getConfig()->get("op-prefix").$sender->getNameTag());
    	    	    	    $sender->sendMessage("Your OP status has been set on your tag.");
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("You need to be OP.");
    	    	    	}
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "restore"){
    	    	    	$sender->setNameTag(str_replace(
    	    	    	    [
    	    	    	    "{ip}",
    	    	    	    "{player}",
    	    	    	    "{port}",
    	    	    	    ],
    	    	    	    [
    	    	    	    $event->getPlayer()->getAddress();
    	    	    	    $event->getPlayer()->getName();
    	    	    	    $event->getPlayer()->getPort();
    	    	    	    ],
    	    	    	    $this->getConfig()->get("default-tag")
    	    	    	));
    	    	    	$sender->sendMessage("Your default name tag has been restored.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "set"){
    	    	    	if(isset($args[1])){
    	    	    	    $target = $this->getServer()->getPlayer($args[1]);
    	    	    	    if($target !== null){
    	    	    	    	if(isset($args[2])){
    	    	    	    	    $target->setNameTag(implode(" ", $args));
    	    	    	    	}
    	    	    	    	else{
    	    	    	    	    return false;
    	    	    	    	}
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§cPlease specify a valid player.");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    if(strtolower($args[0]) === "view"){
    	    	    	$sender->sendMessage("Your tag: ".$sender->getNameTag());
    	    	    	return true;
    	    	    }
    	    	    return false;
    	    	}
    	    	else{
    	    	    $sender->sendMessage("MyTag commands");
    	    	    $sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    $sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    $sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    	    $sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    $sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    $sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    	    $sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    $sender->sendMessage("§a/mytag set §c- §f");
    	    	    $sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	}
    	    }
    	}
    	else{
    	    if(strtolower($command->getName()) === "mytag"){
    	    	if(isset($args[0])){
    	    	    if(strtolower($args[0]) === "help"){
    	    		$sender->sendMessage("MyTag commands");
    	    		$sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    		$sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    		$sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    		$sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    		$sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    		$sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    		$sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    		$sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    		$sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    		return true;
    	    	    }
    	    	    else{
    	    	    	$sender->sendMessage("§cPlease run this command in-game.");
    	    	    	return true;
    	    	    }
    	    	}
    	    	else{
    	    	    $sender->sendMessage("MyTag commands:");
    	    	    $sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    $sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    $sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    	    $sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    $sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    $sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    	    $sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    $sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	    return true;
    	    	}
    	    }
    	}
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	//To-do
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
	if($this->data->exists(strtolower($event->getPlayer()->getName()))){
	    if($this->getConfig()->get("enable")["auto-set"] === true){
	    	$event->getPlayer()->setNameTag($this->data->get($event->getPlayer()->getName()));
	    }
	}
	else{
	    $event->getPlayer()->setNameTag(str_replace(
	    	[
	    	"{ip}",
	    	"{player}",
	    	"{port}"
	    	],
	    	[
	    	$event->getPlayer()->getAddress(),
	    	$event->getPlayer()->getName(),
	    	$event->getPlayer()->getPort()
	    	],
	    	$this->getConfig()->get("default-tag")
	    ));
	    $this->data->set($event->getPlayer()->getName(), $event->getPlayer()->getNameTag());
	    $this->data->save();
	    $this->getServer()->getLogger()->notice("Created player data for ".$event->getPlayer()->getName()." at MyTag\\data.yml");
	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){
    	if($this->data->exists(strtolower($event->getPlayer()->getName()))){
    	    if($this->getConfig()->get("enable")["auto-set"] === true){
	        $this->data->set($event->getPlayer()->getName(), $event->getPlayer()->getNameTag());
	        $this->data->save();
    	    }
    	}
    	else{
	    $this->data->set($event->getPlayer()->getName(), $event->getPlayer()->getNameTag());
	    $this->getServer()->getLogger()->notice("Created player data for ".$event->getPlayer()->getName()." at MyTag\\data.yml");
	    $this->data->save();
	}
    }
}
