<?php

namespace locatorpro;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerInteractEvent;
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
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "getpos"){
                if(isset($args[0])){
                    if($sender->hasPermission("locator.command.getpos.other")){
                        $target = $sender->getServer()->getPlayer($args[0]);
                        if($target != null){
                            $sender->sendMessage($target->getName()."'s location:");
                            $sender->sendMessage("X: ".$target->getX());
                            $sender->sendMessage("Y: ".$target->getY());
                            $sender->sendMessage("Z: ".$target->getZ());
                            $sender->sendMessage("Level: ".$target->getLevel()->getName());
                            $sender->sendMessage("Face: ".$target->getYaw());
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
                    if($sender->hasPermission("locator.command.getpos.self")){
                        $sender->sendMessage("Your location:");
                        $sender->sendMessage("X: ".$sender->getX());
                        $sender->sendMessage("Y: ".$sender->getY());
                        $sender->sendMessage("Z: ".$sender->getZ());
                        $sender->sendMessage("Level: ".$sender->getLevel()->getName());
                        $sender->sendMessage("Face: ".$sender->getYaw());
                    }
                    else{
                        $sender->sendMessage("§cYou don't have permissions to use this command.");
                    }
                }
            }
        }
        else{
            $sender->sendMessage("§cPlease run this command in-game.");
        }
        return true;
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        
    }
    
    public function onPlayerRespawn(PlayerRespawnEvent $event){
        
    }
}
