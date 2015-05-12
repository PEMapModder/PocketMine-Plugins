<?php

namespace fistblaster;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\level\Explosion;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class FistBlasterLoader extends PluginBase implements Listener{

    public function onEnable(){
        $this->fistblaster = array();
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
   
    public function onDisable(){
    	unset($this->fistblaster);
	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "fistblaster"){
            if($sender instanceof Player){
                if(isset($this->fistblaster[$sender->getName()])){
                    unset($this->fistblaster[$sender->getName()]);
                    $sender->sendMessage("§aYou will now no longer blow up blocks you touch.");
                }
                else{
                    $this->fistblaster[$sender->getName()] = true;
                    $sender->sendMessage("§aYou will now blow up all blocks you touch.");
                }
            }
            else{
                $sender->sendMessage("§cPlease run this command in-game.");
            }
            return true;
        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if(isset($this->fistblaster[$event->getPlayer()->getName()])){
            $explosion = new Explosion(new Position($event->getBlock()->getX(), $event->getBlock()->getY(), $event->getBlock()->getZ(), $event->getBlock()->getLevel()), $this->getConfig()->get("size"));
	    $explosion->explode();
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if(isset($this->fistblaster[$event->getPlayer()->getName()])){
            unset($this->fistblaster[$event->getPlayer()->getName()]);
        }
    }
}
