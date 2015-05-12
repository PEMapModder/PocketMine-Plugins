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
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class FistBlasterLoader extends PluginBase implements Listener{

    public function onEnable(){
        $this->blast = array();
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
   
	public function onDisable(){
		$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
	}
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "fistblaster"){
            if($sender instanceof Player){
                if(isset($this->blast[$sender->getName()])){
                    unset($this->blast[$sender->getName()]);
                    $sender->sendMessage(TextFormat::GREEN."You will now no longer blow up blocks you touch.");
                }
                else{
                    $this->blast[$sender->getName()] = true;
                    $sender->sendMessage(TextFormat::GREEN."You will now blow up all blocks you touch.");
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED."You can only use FistBlaster in-game.");
            }
            return true;
        }
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if(isset($this->blast[$event->getPlayer()->getName()])){
            $this->explode = new Explosion(new Position($event->getBlock()->getX(), $event->getBlock()->getY(), $event->getBlock()->getZ(), $event->getBlock()->getLevel()), $this->getConfig()->get("size"));
		$this->explode->explode();
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if(isset($this->blast[$event->getPlayer()->getName()])){
            unset($this->blast[$event->getPlayer()->getName()]);
        }
    }
}
