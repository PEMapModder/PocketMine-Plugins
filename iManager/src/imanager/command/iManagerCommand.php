<?php

namespace imanager\command;

use imanager\iManagerAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class iManagerCommand implements CommandExecutor{

    public function __construct(iManagerAPI $plugin){
    	$this->plugin = $plugin;
    	$this->getPlugin()->getCommand("imanager")->setExecutor($this);
    }
    public function getPlugin(){
        return $this->plugin;
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
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	$sender->sendMessage("§e> §b".$player->getName()." §e- §c".$player->getAddress()."§e:§a".$player->getPort());
		    }
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "burnall"){
    	    	    if(isset($args[1])){
    	    	    	if(is_numeric($args[1])){
    	    	    	    if($args[1] > 0){
    	    	    	    	$sender->sendMessage("§eBurning everyone without EXEMPT status in the server...");
    	    	    	    	foreach($this->getServer()->getOnlinePlayers() as $player){
    	    	    	    	    if($this->exempt->exists(strtolower($player->getName()))){
    	    	    	    	    }
    	    	    	    	    else{
    	    	    	    	        $player->setOnFire($args[1]);
    	    	    	    	        $player->sendMessage("You have been set on fire for ".$args[1]." seconds!");
    	    	    	    	    }
    	    	    	        }
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§cTime value must be greater than 0.");
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
    	    	    foreach($this->getServer()->getOnlinePlayers() as $player){
    	    	    	$player->setOp(false);
    	    	    }
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "gamemodelist"){
		    $sender->sendMessage("§eGamemode of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	$sender->sendMessage("§e> §b".$player->getName()." §e- §c".$player->getGamemode());
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "healthlist"){
		    $sender->sendMessage("§eHealth of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	$sender->sendMessage("§e> §b".$player->getName()." §e- §c".$player->getHealth()."§e/§a".$player->getMaxHealth());
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "help"){
    	    	    $sender->sendMessage("§biManager commands");
    	    	    $sender->sendMessage("§a/imanager addexempt §c- §fAdds a player's name to exempt.txt");
    	    	    $sender->sendMessage("§a/imanager addip §c- §fAdds a player's IP address to ip.txt");
    	    	    $sender->sendMessage("§a/imanager addresslist §c- §fLists every player's IP address and port");
    	    	    $sender->sendMessage("§a/imanager burnall §c- §fBurns all the players without EXEMPT status in the server");
    	    	    $sender->sendMessage("§a/imanager delexempt §c- §fRemoves a player's name from exempt.txt");
    	    	    $sender->sendMessage("§a/imanager delip §c- §fRemoves a player's IP address from ip.txt");
    	    	    $sender->sendMessage("§a/imanager deopall §c- §fRevokes all the player's OP status");
    	    	    $sender->sendMessage("§a/imanager gamemodelist §c- §fLists every player's gamemode");
    	    	    $sender->sendMessage("§a/imanager giveall §c- §f");
    	    	    $sender->sendMessage("§a/imanager healthlist §c- §fLists every player's health");
    	    	    $sender->sendMessage("§a/imanager help §c- §fShows all the sub-commands for /imanager");
    	    	    $sender->sendMessage("§a/imanager info §c- §fGets all the information about a player");
    	     	    $sender->sendMessage("§a/imanager kickall §c- §fKicks all the players without EXEMPT status from the server");
    	    	    $sender->sendMessage("§a/imanager killall §c- §fKills all the players without EXEMPT status in the server");
    	    	    $sender->sendMessage("§a/imanager moneylist §c- §fLists every player's amount of money");
    	    	    $sender->sendMessage("§a/imanager opall §c- §fGrants OP status to everyone in the server");
    	    	    $sender->sendMessage("§a/imanager oplist §c- §fLists all the online OPs");
    	    	    $sender->sendMessage("§a/imanager poslist §c- §fLists every player's coordinates, level, and face direction");
    	    	    $sender->sendMessage("§a/imanager server §c- §fShows all the information about the server");
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "info"){
    	    	    if(isset($args[1])){
    	    	    	$target = $this->getServer()->getPlayer($args[1]);
    	    	    	if($target !== null){
    	    	    	    $sender->sendMessage("§b".$target->getName()."'s §einformation:");
    	    	    	    $sender->sendMessage("§eName: §b".$target->getName());
    	    	    	    $sender->sendMessage("§eDisplay-name: §b".$target->getDisplayName());
    	    	    	    $sender->sendMessage("§eName-tag: §b".$target->getNameTag());
    	    	    	    $sender->sendMessage("§eAddress: §c".$target->getAddress()."§e:§a".$target->getPort());
    	    	    	    $sender->sendMessage("§eHealth: §c".$target->getHealth()."§e/§a".$target->getMaxHealth());
    	    	    	    $sender->sendMessage("§eX: §c".$target->getFloorX());
    	    	    	    $sender->sendMessage("§eY: §9".$target->getFloorY());
    	    	    	    $sender->sendMessage("§eZ: §a".$target->getFloorZ());
    	    	    	    $sender->sendMessage("§eLevel: §d".$target->getLevel()->getName());
    	    	    	    $sender->sendMessage("§eYaw: §6".$target->getYaw());
    	    	    	    $sender->sendMessage("§ePitch: §6".$target->getPitch());
    	    	    	    $sender->sendMessage("§eGamemode: §c".$target->getGamemode());
    	    	    	    $sender->sendMessage("§eHeld-item: §9".$target->getInventory()->getItemInHand()->getName());
    	    	    	    $sender->sendMessage("§eHead-item: §9".$target->getInventory()->getArmorItem(0)->getName());
    	    	    	    $sender->sendMessage("§eChest-item: §9".$target->getInventory()->getArmorItem(1)->getName());
    	    	    	    $sender->sendMessage("§eLeg-item: §9".$target->getInventory()->getArmorItem(2)->getName());
    	    	    	    $sender->sendMessage("§eFeet-item: §9".$target->getInventory()->getArmorItem(3)->getName());
    	    	    	    if($target->isSleeping()){
    	    	    	    	$sender->sendMessage("§eSleeping: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eSleeping: §cno");
    	    	    	    }
    	    	    	    if($target->isInsideOfWater()){
    	    	    	    	$sender->sendMessage("§eInside-water: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eInside-water: §cno");
    	    	    	    }
    	    	    	    if($target->isInsideOfSolid()){
    	    	    	    	$sender->sendMessage("§eInside-solid: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eInside-solid: §cno");
    	    	    	    }
    	    	    	    if($target->isOnGround()){
    	    	    	    	$sender->sendMessage("§eOn-ground: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eOn-ground: §cno");
    	    	    	    }
    	    	    	    if($target->isOp()){
    	    	    	    	$sender->sendMessage("§eOP: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eOP: §cno");
    	    	    	    }
    	    	    	    if($this->exempt->exists(strtolower($target->getName()))){
    	    	    	    	$sender->sendMessage("§eEXEMPT: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eEXEMPT: §cno");
    	    	    	    }
    	    	    	    /*
    	    	    	    if($target->isWhitelisted()){
    	    	    	    	$sender->sendMessage("§eName-whitelisted: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eName-whitelisted: §cno");
    	    	    	    }
    	    	    	    */
    	    	    	    if($this->ip->exists(strtolower($target->getAddress()))){
    	    	    	    	$sender->sendMessage("§eIP-whitelisted: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eIP-whitelisted: §cno");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	    	    $sender->sendMessage("§cPlease specify a valid player.");
    	    	    	}
    	    	    }
    	    	    else{
    	    	    	if($sender instanceof Player){
    	    	    	    $sender->sendMessage("§eYour information:");
    	    	    	    $sender->sendMessage("§eName: §b".$sender->getName());
    	    	    	    $sender->sendMessage("§eDisplay-name: §b".$sender->getDisplayName());
    	    	    	    $sender->sendMessage("§eName-tag: §b".$sender->getNameTag());
    	    	    	    $sender->sendMessage("§eAddress: §c".$sender->getAddress()."§e:§a".$sender->getPort());
    	    	    	    $sender->sendMessage("§eHealth: §c".$sender->getHealth()."§e/§a".$sender->getMaxHealth());
    	    	    	    $sender->sendMessage("§eX: §c".$sender->getFloorX());
    	    	    	    $sender->sendMessage("§eY: §9".$sender->getFloorY());
    	    	    	    $sender->sendMessage("§eZ: §a".$sender->getFloorZ());
    	    	    	    $sender->sendMessage("§eLevel: §d".$sender->getLevel()->getName());
    	    	    	    $sender->sendMessage("§eYaw: §6".$sender->getYaw());
    	    	    	    $sender->sendMessage("§ePitch: §6".$sender->getPitch());
    	    	    	    $sender->sendMessage("§eGamemode: §c".$sender->getGamemode());
    	    	    	    $sender->sendMessage("§eHeld-item: §9".$sender->getInventory()->getItemInHand()->getName());
    	    	    	    $sender->sendMessage("§eHead-item: §9".$sender->getInventory()->getArmorItem(0)->getName());
    	    	    	    $sender->sendMessage("§eChest-item: §9".$sender->getInventory()->getArmorItem(1)->getName());
    	    	    	    $sender->sendMessage("§eLeg-item: §9".$sender->getInventory()->getArmorItem(2)->getName());
    	    	    	    $sender->sendMessage("§eFeet-item: §9".$sender->getInventory()->getArmorItem(3)->getName());
    	    	    	    if($sender->isSleeping()){
    	    	    	    	$sender->sendMessage("§eSleeping: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eSleeping: §cno");
    	    	    	    }
    	    	    	    if($sender->isInsideOfWater()){
    	    	    	    	$sender->sendMessage("§eInside-water: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eInside-water: §cno");
    	    	    	    }
    	    	    	    if($sender->isInsideOfSolid()){
    	    	    	    	$sender->sendMessage("§eInside-solid: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eInside-solid: §cno");
    	    	    	    }
    	    	    	    if($sender->isOnGround()){
    	    	    	    	$sender->sendMessage("§eOn-ground: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eOn-ground: §cno");
    	    	    	    }
    	    	    	    if($sender->isOp()){
    	    	    	    	$sender->sendMessage("§eOP: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eOP: §cno");
    	    	    	    }
    	    	    	    if($this->exempt->exists(strtolower($sender->getName()))){
    	    	    	    	$sender->sendMessage("§eEXEMPT: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eEXEMPT: §cno");
    	    	    	    }
    	    	    	    /*
    	    	    	    if($sender->isWhitelisted()){
    	    	    	    	$sender->sendMessage("§eName-whitelisted: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eName-whitelisted: §cno");
    	    	    	    }
    	    	    	    */
    	    	    	    if($this->ip->exists(strtolower($sender->getAddress()))){
    	    	    	    	$sender->sendMessage("§eIP-whitelisted: §ayes");
    	    	    	    }
    	    	    	    else{
    	    	    	    	$sender->sendMessage("§eIP-whitelisted: §cno");
    	    	    	    }
    	    	    	}
    	    	    	else{
    	    	            $sender->sendMessage("§cPlease specify a valid player that is in-game.");
    	    	    	}
    	    	    }
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "kickall"){
		    $sender->sendMessage("§eKicking everyone without EXEMPT status from the server...");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	if($this->exempt->exists(strtolower($player->getName()))){
		    	}
		    	else{
		    	    $player->kick();
		    	}
		    }
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "killall"){
		    $sender->sendMessage("§eKilling everyone without EXEMPT status in the server...");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	if($this->exempt->exists(strtolower($player->getName()))){
		    	}
		    	else{
		    	    $player->kill();
		    	}
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "moneylist"){
		    $sender->sendMessage("§eAmount of money of all players that are currently online");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	$sender->sendMessage("§e> §b".$player->getName()." §f- ");
			//To-do
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "opall"){
    	    	    $sender->sendMessage("§eGranting OP status to everyone in the server...");
    	    	    foreach($this->getServer()->getOnlinePlayers() as $player){
    	    	    	$player->setOp(true);
    	    	    }
    	    	    return true;
    	    	}
    	    	if(strtolower($args[0]) === "oplist"){
		    $sender->sendMessage("§eOPs that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	if($player->isOp()){
		    	    $sender->sendMessage("§e> §b".$player->getName());
		    	}
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "poslist"){
		    $sender->sendMessage("§eLocation of all players that are currently online:");
		    foreach($this->getServer()->getOnlinePlayers() as $player){
		    	$sender->sendMessage("§e> §b".$player->getName()." §e- X: §c".$player->getFloorX()." §eY: §9".$player->getFloorY()." §eZ: §a".$player->getFloorZ()." §eLevel: §d".$player->getLevel()->getName()." §eYaw: §6".$player->getYaw()." §ePitch: §6".$player->getPitch());
		    }	
		    return true;
    	    	}
    	    	if(strtolower($args[0]) === "server"){
    	    	    $sender->sendMessage("Information of the server:");
    	    	    $sender->sendMessage("Players: ".count($this->getServer()->getOnlinePlayers())."/".$this->getServer()->getMaxPlayers());
    	    	    return true;
    	    	}
		return false;
    	    }
    	    else{
    	    	$sender->sendMessage("§biManager commands");
    	    	$sender->sendMessage("§a/imanager addexempt §c- §fAdds a player's name to exempt.txt");
    	    	$sender->sendMessage("§a/imanager addip §c- §fAdds a player's IP address to ip.txt");
    	    	$sender->sendMessage("§a/imanager addresslist §c- §fLists every player's IP address and port");
    	    	$sender->sendMessage("§a/imanager burnall §c- §fBurns all the players without EXEMPT status in the server");
    	    	$sender->sendMessage("§a/imanager delexempt §c- §fRemoves a player's name from exempt.txt");
    	    	$sender->sendMessage("§a/imanager delip §c- §fRemoves a player's IP address from ip.txt");
    	    	$sender->sendMessage("§a/imanager deopall §c- §fRevokes all the player's OP status");
    	    	$sender->sendMessage("§a/imanager gamemodelist §c- §fLists every player's gamemode");
    	    	$sender->sendMessage("§a/imanager giveall §c- §f");
    	    	$sender->sendMessage("§a/imanager healthlist §c- §fLists every player's health");
    	    	$sender->sendMessage("§a/imanager help §c- §fShows all the sub-commands for /imanager");
    	    	$sender->sendMessage("§a/imanager info §c- §fGets all the information about a player");
    	    	$sender->sendMessage("§a/imanager kickall §c- §fKicks all the players without EXEMPT status from the server");
    	    	$sender->sendMessage("§a/imanager killall §c- §fKills all the players without EXEMPT status in the server");
    	    	$sender->sendMessage("§a/imanager moneylist §c- §fLists every player's amount of money");
    	    	$sender->sendMessage("§a/imanager opall §c- §fGrants OP status to everyone in the server");
    	    	$sender->sendMessage("§a/imanager oplist §c- §fLists all the online OPs");
    	    	$sender->sendMessage("§a/imanager poslist §c- §fLists every player's coordinates, level, and face direction");
    	    	$sender->sendMessage("§a/imanager server §c- §fShows all the information about the server");
    	    	return true;
    	    }
    	}
    }
}
