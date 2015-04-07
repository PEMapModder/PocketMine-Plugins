<?php

namespace imanager;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{

    public $chat;
    
    public $exempt;
    
    public $ip;
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    @mkdir($this->getDataFolder());
            $this->chat = new Config($this->getDataFolder()."chat.txt", Config::ENUM);
            $this->exempt = new Config($this->getDataFolder()."exempt.txt", Config::ENUM);
            $this->ip = new Config($this->getDataFolder()."ip.txt", Config::ENUM);
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
	    $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->chat->save();
        $this->exempt->save();
        $this->ip->save();
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if(strtolower($command->getName()) === "imanager"){
    	    if(isset($args[0])){
    	    	if(strtolower($args[0]) === "addexempt"){
 		    if(isset($args[1])){
    	    	    	$target = strtolower($this->getServer()->getPlayer($args[1]));
    	    	    	if($target !== null){
    	    	    	    if($this->exempt->exists(strtolower($target->getName()))){
    	    	    	    	$sender->sendMessage("§cThat name already exists in exempt.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$this->exempt->set($target->getAddress());
    	    	    	    	$this->exempt->save();	
    	    	    	    	$sender->sendMessage("§aAdded ".$target->getName()." to exempt.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
			    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	if($sender instanceof Player){
    	    	    	    if($this->exempt->exists(strtolower($sender->getName()))){
    	    	    	    	$sender->sendMessage("§cYour name already exists in exempt.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$this->exempt->set($sender->getName());
    	    	    	    	$this->exempt->save();
    	    	    	    	$sender->sendMessage("§aAdded ".$sender->getName()." to exempt.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease run this command in-game.");
    	    	    	}
    	    	    }	
    	    	}
    	    	if(strtolower($args[0]) === "addip"){
    	    	    if(isset($args[1])){
    	    	    	$target = strtolower($this->getServer()->getPlayer($args[1]));
    	    	    	if($target !== null){
    	    	    	    if($this->ip->exists(strtolower($target->getAddress()))){
    	    	    	    	$sender->sendMessage("§cThat IP address already exists in ip.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$this->ip->set($target->getAddress());
    	    	    	    	$this->ip->save();	
    	    	    	    	$sender->sendMessage("§aAdded ".$target->getAddress()." to ip.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
			    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	if($sender instanceof Player){
    	    	    	    if($this->ip->exists(strtolower($sender->getAddress()))){
    	    	    	    	$sender->sendMessage("§cYour IP address already exists in ip.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$this->ip->set($sender->getAddress());
    	    	    	    	$this->ip->save();
    	    	    	    	$sender->sendMessage("§aAdded ".$sender->getAddress()." to ip.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease run this command in-game.");
    	    	    	}
    	    	    }
    	    	} 
    	    	if(strtolower($args[0]) === "addresslist"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("> ".$players->getName().": ".$players->getAddress().":".$players->getPort());
		    }
    	    	}
    	    	if(strtolower($args[0]) === "delexempt"){
    	    	    if(isset($args[1])){
    	    	    	$target = strtolower($this->getServer()->getPlayer($args[1]));
    	    	    	if($target !== null){
    	    	    	    if($this->exempt->exists(strtolower($target->getName()))){
    	    	    	    	$this->exempt->remove($target->getName());
    	    	    	    	$this->exempt->save();
    	    	    	    	$sender->sendMessage("§aRemoved ".$target->getName()." from exempt.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§cThat name does not exist in exempt.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
			    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	if($sender instanceof Player){
    	    	    	    if($this->exempt->exists(strtolower($sender->getName()))){
    	    	    	    	$this->exempt->remove($sender->getName());
    	    	    	    	$this->exempt->save();
    	    	    	    	$sender->sendMessage("§aRemoved your name from exempt.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§cYour name does not exist in exempt.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease run this command in-game.");
    	    	    	}
    	    	    }	
    	    	}
    	    	if(strtolower($args[0]) === "delip"){
    	    	    if(isset($args[1])){
    	    	    	$target = strtolower($this->getServer()->getPlayer($args[1]));
    	    	    	if($target !== null){
    	    	    	    if($this->ip->exists(strtolower($target->getAddress()))){
    	    	    	    	$this->ip->remove($target->getAddress());
    	    	    	    	$this->ip->save();
    	    	    	    	$sender->sendMessage("§aRemoved ".$target->getAddress()." from ip.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§cThat IP address does not exist in ip.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
			    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	if($sender instanceof Player){
    	    	    	    if($this->ip->exists(strtolower($sender->getAddress()))){
    	    	    	    	$this->ip->remove($sender->getAddress());
    	    	    	    	$this->ip->save();
    	    	    	    	$sender->sendMessage("§aRemoved your IP address from ip.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§cYour IP address does not exist in ip.txt.");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease run this command in-game.");
    	    	    	}
    	    	    }
    	    	}
    	    	if(strtolower($args[0]) === "gamemodelist"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "healthlist"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "help"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "info"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "kickall"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "killall"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "moneylist"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "opall"){
    	    		
    	    	}
    	    	if(strtolower($args[0]) === "oplist"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "poslist"){
		    $sender->sendMessage("");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	
		    }	
    	    	}
    	    }
    	    else{
    	    	$sender->sendMessage();
    	    }
    	}
    	return true;
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	if($this->getConfig()->get("enable")["chat-log"] === true){
    	    $this->chat->set($event->getPlayer()->getName().": ".$event->getMessage());
    	}
    }
    
    public function onPlayerPreLogin(PlayerPreLoginEvent $event){
    	if($this->getConfig()->get("enable")["ip-whitelist"] === true){
    	    if($this->ip->exists(strtolower($event->getPlayer()->getAddress()))){
    	    }
    	    else{
    	    	$event->setCancelled();
    	    }
    	}
    }
}
