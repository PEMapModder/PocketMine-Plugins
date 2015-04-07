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
            $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
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
                        if($target->getYaw() === 0){
                            $sender->sendMessage("Facing: south");                            $sender->sendMessage("Facing: west");                            $sender->sendMessage("Facing: west");
                        }
                        elseif($target->getYaw() === 1){
                            $sender->sendMessage("Facing: west");
                        }
                        elseif($target->getYaw() === 2){
                            $sender->sendMessage("Facing: north");                            $sender->sendMessage("Facing: west");
                        }
                        elseif($target->getYaw() === 3){
                            $sender->sendMessage("Facing: east");
                        }
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
                        if($sender->getYaw() === 0){
                            $sender->sendMessage("Facing: south");                            $sender->sendMessage("Facing: west");                            $sender->sendMessage("Facing: west");
                        }
                        elseif($sender->getYaw() === 1){
                            $sender->sendMessage("Facing: west");
                        }
                        elseif($sender->getYaw() === 2){
                            $sender->sendMessage("Facing: north");                            $sender->sendMessage("Facing: west");
                        }
                        elseif($sender->getYaw() === 3){
                            $sender->sendMessage("Facing: east");
                        }
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
        if(strtolower($command->getName()) === "lastpos"){
            
        }
        if(strtolower($command->getName()) === "savepos"){
            if(isset($args[0])){
                
            }
            else{
                
            }
        }
        return true;
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($event->getBlock()->getId() === $this->getConfig()->get("tap-block")){
            @mkdir($this->getDataFolder()."data/");
            file_put_contents($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml", yaml_emit(array("x" => $event->getBlock()->getX(), "y" => $event->getBlock()->getY(), "z" => $event->getBlock()->getZ())));
            $event->getPlayer()->sendMessage("Coordinates saved.");
        }
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
        if(file_exists($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml")){
            
        }
        else{
            $this->getServer()->getLogger()->info("§eCreated new data file for ".$event->getPlayer()->getName()." at LocatorPro\\data\\".$event->getPlayer()->getName().".yml");
        }
    }
    
    public function onPlayerMove(PlayerMoveEvent $event){
        
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        
    }
}
