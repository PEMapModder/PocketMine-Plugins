<?php

namespace fistblaster;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\level\Explosion;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class FistBlasterLoader extends PluginBase implements Listener{

    public function onEnable(){
    	$this->saveFiles();
        $this->fistblaster = array();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
   
    public function onDisable(){
	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
    	if(file_exists($this->getDataFolder()."config.yml")){
    	    if(!is_bool($this->getConfig()->getNested("enable.damage-explosion"))){
    	    	$this->getConfig()->setNested("enable.damage-explosion", true);
    	    }
    	    if(!is_bool($this->getConfig()->getNested("enable.interact-explosion"))){
    	    	$this->getConfig()->setNested("enable.interact-explosion", true);
    	    }
    	    if(!is_numeric($this->getConfig()->get("size"))){
    	    	$this->getConfig()->set("size", 10);
    	    }
    	}
    	else{
    	    $this->saveDefaultConfig();
    	}
    }
    
    public function isBlasterEnabled(Player $player){
    	return in_array($player->getName(), $this->fistblaster);	
    }
    
    public function setPlayerBlaster(Player $player, $value){
    	if($value === true){
    	    $this->fistblaster[$player->getName()] = true;
    	}
    	else{
    	    unset($this->fistblaster[$player->getName()]);
    	}
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "fistblaster"){
            if($sender instanceof Player){
                if($this->isBlasterEnabled($sender)){
                    $this->setPlayerBlaster($sender, false);
                    $sender->sendMessage($this->getConfig()->getNested("message.blaster-disable"));
                }
                else{
                    $this->setPlayerBlaster($sender, true);
                    $sender->sendMessage($this->getConfig()->getNested("message.blaster-enable"));
                }
            }
            else{
                $sender->sendMessage("§cPlease run this command in-game.");
            }
            return true;
        }
    }
    
    public function onEntityDamage(EntityDamageEvent $event){
    	if($event->getCause() === 1){
    	    
    	}
    }
    
    public function onPlayerInteract(PlayerInteractEvent $event){
        if($this->isBlasterEnabled($event->getPlayer())){
            $explosion = new Explosion(new Position($event->getBlock()->getX(), $event->getBlock()->getY(), $event->getBlock()->getZ(), $event->getBlock()->getLevel()), $this->getConfig()->get("size"));
	    $explosion->explode();
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if($this->isBlasterEnabled($event->getPlayer())){
            $this->setPlayerBlaster($event->getPlayer(), false);
        }
    }
}
