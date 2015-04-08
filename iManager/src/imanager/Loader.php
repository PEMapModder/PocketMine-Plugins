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
	    $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
    	$this->chat->save();
        $this->exempt->save();
        $this->ip->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
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
    	    	    return true;
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
    	    	    return true;
    	    	} 
    	    	if(strtolower($args[0]) === "addresslist"){
		    $sender->sendMessage("§eIP address and port of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- §c".$players->getAddress()."§e:§a".$players->getPort());
		    }
		    return true;
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
    	    	    return true;
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
    	    	    return true;
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
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "deopall"){
    	    	    $sender->sendMessage("§eRevoking OP status of everyone in the server...");
    	    	    foreach($this->getServer()->getOnlinePlayers() as $players){
    	    	    	$players->setOp(false);
    	    	    }
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "gamemodelist"){
		    $sender->sendMessage("§eGamemode of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- §c".$players->getGamemode());
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "healthlist"){
		    $sender->sendMessage("§eHealth of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- §c".$players->getHealth()."§e/§a".$players->getMaxHealth());
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "help"){
    	    	    $sender->sendMessage("iManager commands");
    	    	    $sender->sendMessage("§a/imanager addexempt §c- §fAdds a player's name to exempt.txt");
    	    	    $sender->sendMessage("§a/imanager addip §c- §fAdds a player's IP address to ip.txt");
    	    	    $sender->sendMessage("§a/imanager addresslist §c- §fLists every player's IP address and port");
    	    	    $sender->sendMessage("§a/imanager burnall §c- §fBurns all the players without EXEMPT status in the server");
    	    	    $sender->sendMessage("§a/imanager delexempt §c- §fRemoves a player's name from exempt.txt");
    	    	    $sender->sendMessage("§a/imanager delip §c- §fRemoves a player's IP address from ip.txt");
    	    	    $sender->sendMessage("§a/imanager deopall §c- §fRevokes all the player's OP status");
    	    	    $sender->sendMessage("§a/imanager gamemodelist §c- §fLists every player's gamemode");
    	    	    $sender->sendMessage("§a/imanager healthlist §c- §fLists every player's health");
    	    	    $sender->sendMessage("§a/imanager help §c- §fShows all the sub-commands for /imanager");
    	    	    $sender->sendMessage("§a/imanager info §c- §fGets all the information about a player");
    	     	    $sender->sendMessage("§a/imanager kickall §c- §fKicks all the players without EXEMPT status from the server");
    	    	    $sender->sendMessage("§a/imanager killall §c- §fKills all the players without EXEMPT status in the server");
    	    	    $sender->sendMessage("§a/imanager moneylist §c- §fLists every player's amount of money");
    	    	    $sender->sendMessage("§a/imanager opall §c- §fGrants OP status to everyone in the server");
    	    	    $sender->sendMessage("§a/imanager oplist §c- §fLists all the online OPs");
    	    	    $sender->sendMessage("§a/imanager poslist §c- §fLists every player's coordinates, level, and face direction");
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "info"){
    	    	    if(isset($args[1])){
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	if($target !== null){
    	    	    	    $sender->sendMessage("§e".$target->getName()."'s information:");
    	    	    	    $sender->sendMessage("§eName: ".$target->getName());
    	    	    	    $sender->sendMessage("§eDisplay name: ".$target->getDisplayName());
    	    	    	    $sender->sendMessage("§eName tag: ".$target->getNameTag());
    	    	    	    $sender->sendMessage("§eAddress: ".$target->getAddress().":".$target->getPort());
    	    	    	    $sender->sendMessage("§eHealth: ".$target->getHealth()."/".$target->getMaxHealth());
    	    	    	    $sender->sendMessage("§eX: ".$target->getFloorX());
    	    	    	    $sender->sendMessage("§eY: ".$target->getFloorY());
    	    	    	    $sender->sendMessage("§eZ: ".$target->getFloorZ());
    	    	    	    $sender->sendMessage("§eLevel: ".$target->getLevel()->getName());
    	    	    	    $sender->sendMessage("§eYaw: ".$target->getYaw());
    	    	    	    $sender->sendMessage("§ePitch: ".$target->getPitch());
    	    	    	    $sender->sendMessage("§eGamemode: ".$target->getGamemode());
    	    	    	    $sender->sendMessage("§eHeld item: ".$target->getInventory()->getItemInHand()->getName());
    	    	    	    $sender->sendMessage("§eHead item: ".$target->getInventory()->getArmorItem(0)->getName());
    	    	    	    $sender->sendMessage("§eChest item: ".$target->getInventory()->getArmorItem(1)->getName());
    	    	    	    $sender->sendMessage("§eLeg item: ".$target->getInventory()->getArmorItem(2)->getName());
    	    	    	    $sender->sendMessage("§eFeet item: ".$target->getInventory()->getArmorItem(3)->getName());
    	    	    	    if($target->isSleeping()){
    	    	    	    	$sender->sendMessage("§eSleeping: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eSleeping: no");
    	    	    	    }
    	    	    	    if($target->isInsideOfWater()){
    	    	    	    	$sender->sendMessage("§eInside water: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eInside water: no");
    	    	    	    }
    	    	    	    if($target->isInsideOfSolid()){
    	    	    	    	$sender->sendMessage("§eInside solid: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eInside solid: no");
    	    	    	    }
    	    	    	    if($target->isOnGround()){
    	    	    	    	$sender->sendMessage("§eOn ground: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eOn ground: no");
    	    	    	    }
    	    	    	    if($target->isOp()){
    	    	    	    	$sender->sendMessage("§eOP: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eOP: no");
    	    	    	    }
    	    	    	    if($this->exempt->exists(strtolower($target->getName()))){
    	    	    	    	$sender->sendMessage("§eEXEMPT: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eEXEMPT: no");
    	    	    	    }
    	    	    	    if($target->isWhitelisted()){
    	    	    	    	$sender->sendMessage("§eName whitelisted: yes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eName whitelisted: no");
    	    	    	    }
    	    	    	    if($this->ip->exists(strtolower($target->getAddress()))){
    	    	    	    	
    	    	    	    }
    	    	    	    else{
    	    	    	    	
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	$sender->sendMessage("Your information:");
    	    	    }
    	    	    return true;
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
		    return true;
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
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "moneylist"){
		    $sender->sendMessage("§eAmount of money of all players that are currently online");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §f- ");
			//To-do
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "opall"){
    	    	    $sender->sendMessage("§eGranting OP status to everyone in the server...");
    	    	    foreach($this->getServer()->getOnlinePlayers() as $players){
    	    	    	$players->setOp(true);
    	    	    }
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "oplist"){
		    $sender->sendMessage("§eOPs that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	if($players->isOp()){
		    	    $sender->sendMessage("§e> §b".$players->getName());
		    	}
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "poslist"){
		    $sender->sendMessage("§eLocation of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $players){
		    	$sender->sendMessage("§e> §b".$players->getName()." §e- X: §c".$players->getFloorX()." §eY: §9".$players->getFloorY()." §eZ: §a".$players->getFloorZ()." §eLevel: §d".$players->getLevel()->getName()." §eYaw: §6".$players->getYaw());
		    }	
		    return true;
    	    	}
		return false;
    	    }
    	    else{
    	    	$sender->sendMessage("iManager commands");
    	    	$sender->sendMessage("§a/imanager addexempt §c- §fAdds a player's name to exempt.txt");
    	    	$sender->sendMessage("§a/imanager addip §c- §fAdds a player's IP address to ip.txt");
    	    	$sender->sendMessage("§a/imanager addresslist §c- §fLists every player's IP address and port");
    	    	$sender->sendMessage("§a/imanager burnall §c- §fBurns all the players without EXEMPT status in the server");
    	    	$sender->sendMessage("§a/imanager delexempt §c- §fRemoves a player's name from exempt.txt");
    	    	$sender->sendMessage("§a/imanager delip §c- §fRemoves a player's IP address from ip.txt");
    	    	$sender->sendMessage("§a/imanager deopall §c- §fRevokes all the player's OP status");
    	    	$sender->sendMessage("§a/imanager gamemodelist §c- §fLists every player's gamemode");
    	    	$sender->sendMessage("§a/imanager healthlist §c- §fLists every player's health");
    	    	$sender->sendMessage("§a/imanager help §c- §fShows all the sub-commands for /imanager");
    	    	$sender->sendMessage("§a/imanager info §c- §fGets all the information about a player");
    	    	$sender->sendMessage("§a/imanager kickall §c- §fKicks all the players without EXEMPT status from the server");
    	    	$sender->sendMessage("§a/imanager killall §c- §fKills all the players without EXEMPT status in the server");
    	    	$sender->sendMessage("§a/imanager moneylist §c- §fLists every player's amount of money");
    	    	$sender->sendMessage("§a/imanager opall §c- §fGrants OP status to everyone in the server");
    	    	$sender->sendMessage("§a/imanager oplist §c- §fLists all the online OPs");
    	    	$sender->sendMessage("§a/imanager poslist §c- §fLists every player's coordinates, level, and face direction");
    	    	return true;
    	    }
    	}
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
