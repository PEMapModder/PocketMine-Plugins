<?php

namespace locatorpro;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDesrcription()->getFullName()."is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "getpos"){
            if(isset($args[0])){
                if($sender->hasPermission("locator.command.getpos.other")){
                    $target = $sender->getServer()->getPlayer($args[0]);
                    if($target !== null){
                        $sender->sendMessage($target->getName()."'s location:");
                        $sender->sendMessage("X: ".$target->getFloorX());
                        $sender->sendMessage("Y: ".$target->getFloorY());
                        $sender->sendMessage("Z: ".$target->getFloorZ());
                        $sender->sendMessage("Level: ".$target->getLevel()->getName());
                        $sender->sendMessage("Yaw: ".$target->getYaw());
                        $sender->sendMessage("Pitch: ".$target->getPitch());
                    }
                    else{
                        $sender->sendMessage("§cPlease specify a valid player.");
                    }
                }
                else{
                    $sender->sendMessage("§cYou don't have permissions to use this command.");
                }
            }
            else{
                if($sender instanceof Player){
                    if($sender->hasPermission("locator.command.getpos.self")){
                        $sender->sendMessage("Your location:");
                        $sender->sendMessage("X: ".$sender->getFloorX());
                        $sender->sendMessage("Y: ".$sender->getFloorY());
                        $sender->sendMessage("Z: ".$sender->getFloorZ());
                        $sender->sendMessage("Level: ".$sender->getLevel()->getName());
                        $sender->sendMessage("Yaw: ".$sender->getYaw());
                        $sender->sendMessage("Pitch: ".$sender->getPitch());
                    }
                    else{
                        $sender->sendMessage("§cYou don't have permissions to use this command.");
                    }
                }
                else{
                    $sender->sendMessage("§cPlease run this command in-game.");
                }
            }
        }
        if(strtolower($command->getName()) === "locatorpro"){
            
        }
        return true;
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if(file_exists($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml")){
            
        }
        else{
            $this->getServer()->getLogger()->notice("Created new data file for ".$event->getPlayer()->getName()." at LocatorPro\\data\\".$event->getPlayer()->getName().".yml");
        }
    }
    
    public function onPlayerMove(PlayerMoveEvent $event){
        
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        
    }
}
