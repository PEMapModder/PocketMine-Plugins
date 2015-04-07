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
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	if($target !== null){
    	    	    	    if($this->exempt->exists(strtolower($target->getName()))){
    	    	    	    	$sender->sendMessage("§cThat name already exists in exempt.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$this->exempt->set(strtolower($target->getName()));
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
    	    	    	    	$this->exempt->set(strtolower($sender->getName()));
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
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	if($target !== null){
    	    	    	    if($this->ip->exists(strtolower($target->getAddress()))){
    	    	    	    	$sender->sendMessage("§cThat IP address already exists in ip.txt.");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$this->ip->set(strtolower($target->getAddress()));
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
    	    	    	    	$this->ip->set(strtolower($sender->getAddress()));
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
		    $sender->sendMessage("§eIP address and port of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- §c".$players->getAddress()."§f:§a".$players->getPort());
		    }
    	    	}
    	    	if(strtolower($args[0]) === "burnall"){
    	    	    if(isset($args[1])){
    	    	    	if(is_numeric($args[1])){
    	    	    	    foreach($this->getServer()->getOnlinePlayers() as $players){
    	    	    	    	$sender->sendMessage("§eBurning everyone without EXEMPT status in the server...");
    	    	    	    	if($this->exempt->exists(strtolower($players->getName()))){
    	    	    	    	}
    	    	    	    	else{
    	    	    	    	    $players->setOnFire($args[1]);
    	    	    	    	    $players->sendMessage("You have been set on fire for ".$args[1]." seconds!");
    	    	    	    	}
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cTime value must be in numerical form.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	$sender->sendMessage("§cPlease specify a valid time value.");
    	    	    }
    	    	}
    	    	if(strtolower($args[0]) === "delexempt"){
    	    	    if(isset($args[1])){
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	if($target !== null){
    	    	    	    if($this->exempt->exists(strtolower($target->getName()))){
    	    	    	    	$this->exempt->remove(strtolower($target->getName()));
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
    	    	    	    	$this->exempt->remove(strtolower($sender->getName()));
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
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	if($target !== null){
    	    	    	    if($this->ip->exists(strtolower($target->getAddress()))){
    	    	    	    	$this->ip->remove(strtolower($target->getAddress()));
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
    	    	    	    	$this->ip->remove(strtolower($sender->getAddress()));
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
    	    	if(strtolower($args[0]) === "deopall"){
    	    	    $sender->sendMessage("§eRevoking OP status of everyone in the server...");
    	    	    foreach($this->getServer()->getOnlinePlayers() as $players){
    	    	    	$players->setOp(false);
    	    	    }
    	    	}
    	    	if(strtolower($args[0]) === "gamemodelist"){
		    $sender->sendMessage("§eGamemode of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- §c".$players->getGamemode());

		    }	
    	    	}
    	    	if(strtolower($args[0]) === "healthlist"){
		    $sender->sendMessage("§eHealth of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- §c".$players->getHealth()."§e/§a".$players->getMaxHealth());

		    }	
    	    	}
    	    	if(strtolower($args[0]) === "help"){
    	    	    $sender->sendMessage("iManager commands:");
    	    	    $sender->sendMessage("/imanager addexempt: Adds a player's name to exempt.txt");
    	    	    $sender->sendMessage("/imanager addip: Adds a player's IP address to ip.txt");
    	    	    $sender->sendMessage("/imanager addresslist: Lists every player's IP address and port");
    	    	    $sender->sendMessage("/imanager burnall: Burns all the players without EXEMPT status in the server");
    	    	    $sender->sendMessage("/imanager delexempt: Removes a player's name from exempt.txt");
    	    	    $sender->sendMessage("/imanager delip: Removes a player's IP address from ip.txt");
    	    	    $sender->sendMessage("/imanager gamemodelist: Lists every player's gamemode");
    	            $sender->sendMessage("/imanager healthlist: Lists every player's health");
    	    	    $sender->sendMessage("/imanager help: Shows all the sub-commands for /imanager");
    	    	    $sender->sendMessage("/imanager info: Gets all the info about a player");
    	    	    $sender->sendMessage("/imanager kickall: Kicks all the players without EXEMPT status from the server");
    	    	    $sender->sendMessage("/imanager killall: Kills all the players without EXEMPT status in the server");
    	    	    $sender->sendMessage("/imanager moneylist: Lists every player's amount of money");
    	    	    $sender->sendMessage("/imanager opall: Grants OP status to everyone in the server");
    	    	    $sender->sendMessage("/imanager oplist: Lists all the online OPs");
    	    	    $sender->sendMessage("/imanager poslist: Lists every player's coordinates, level, and face direction");	
    	    	}
    	    	if(strtolower($args[0]) === "info"){
    	    	    if(isset($args[1])){
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	$sender->sendMessage();
    	    	    }
    	    	    else{
    	    	    	$sender->sendMessage("§cPlease specify a valid player");
    	    	    }
    	    	}
    	    	if(strtolower($args[0]) === "kickall"){
		    $sender->sendMessage("§eKicking everyone without EXEMPT status from the server...");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	if($this->exempt->exists(strtolower($players->getName()))){
		    	}
		    	else{
		    	    $players->kick();
		    	}
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "killall"){
		    $sender->sendMessage("§eKilling everyone without EXEMPT status in the server...");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	if($this->exempt->exists(strtolower($players->getName()))){
		    	}
		    	else{
		    	    $players->kill();
		    	}
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "moneylist"){
		    $sender->sendMessage("§eAmount of money of all players that are currently online");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §f- ");
			//To-do
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "opall"){
    	    	    $sender->sendMessage("§eGranting OP status to everyone in the server...");
    	    	    foreach($this->getServer()->getOnlinePlayers() as $players){
    	    	    	$players->setOp(true);
    	    	    }
    	    	}
    	    	if(strtolower($args[0]) === "oplist"){
		    $sender->sendMessage("§eOPs that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	if($players->isOp()){
		    	    $sender->sendMessage("§e> §b".$players->getName());
		    	}
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "poslist"){
		    $sender->sendMessage("§eLocation of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- X: §c".$players->getFloorX()." §eY: §9".$players->getFloorY()." §eZ: §a".$players->getFloorZ()." §eLevel: §d".$players->getLevel()->getName()." §eYaw: §6".$players->getYaw());
		    }	
    	    	}
    	    	if(strtolower($args[0]) === "usage"){
    	    	    $sender->sendMessage("iManager usage:");
    	    	}
    	    }
    	    else{
    	    	$sender->sendMessage("iManager commands:");
    	    	$sender->sendMessage("/imanager addexempt: Adds a player's name to exempt.txt");
    	    	$sender->sendMessage("/imanager addip: Adds a player's IP address to ip.txt");
    	    	$sender->sendMessage("/imanager addresslist: Lists every player's IP address and port");
    	    	$sender->sendMessage("/imanager burnall: Burns all the players without EXEMPT status in the server");
    	    	$sender->sendMessage("/imanager delexempt: Removes a player's name from exempt.txt");
    	    	$sender->sendMessage("/imanager delip: Removes a player's IP address from ip.txt");
    	    	$sender->sendMessage("/imanager deop: Revokes all the player's OP status");
    	    	$sender->sendMessage("/imanager gamemodelist: Lists every player's gamemode");
    	    	$sender->sendMessage("/imanager healthlist: Lists every player's health");
    	    	$sender->sendMessage("/imanager help: Shows all the sub-commands for /imanager");
    	    	$sender->sendMessage("/imanager info: Gets all the information about a player");
    	    	$sender->sendMessage("/imanager kickall: Kicks all the players without EXEMPT status from the server");
    	    	$sender->sendMessage("/imanager killall: Kills all the players without EXEMPT status in the server");
    	    	$sender->sendMessage("/imanager moneylist: Lists every player's amount of money");
    	    	$sender->sendMessage("/imanager opall: Grants OP status to everyone in the server");
    	    	$sender->sendMessage("/imanager oplist: Lists all the online OPs");
    	    	$sender->sendMessage("/imanager poslist: Lists every player's coordinates, level, and face direction");
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
