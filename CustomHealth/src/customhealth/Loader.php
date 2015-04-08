<?php

namespace customhealth;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){

    }
    
    public function onEntityDamage(EntityDamageEvent $event){
        if($event->getEntity() instanceof Player){
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_CONTACT){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_ENTITY_ATTACK){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_PROJECTILE){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_SUFFOCATION){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_FALL){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_FIRE){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_FIRE_TICK){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_LAVA){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_DROWNING){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_BLOCK_EXPLOSION){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_ENTITY_EXPLOSION){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_VOID){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_SUICIDE){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_MAGIC){
                
            }
            if($event->getEntity() instanceof Player && $event->getCause() === EntityDamageEvent::CAUSE_CUSTOM){
                
            }
        }
    }
    
    public function onEntityRegainHealth(EntityRegainHealthEvent $event){
        if($event->getEntity() instanceof Player){
           
        }
    }
}
