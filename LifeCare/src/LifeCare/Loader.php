<?php

namespace LifeCare;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."LifeCare enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."LifeCare disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "life"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "add"){
                    
                }
                if(strtolower($args[0]) === "set"){
                    
                }
                if(strtolower($args[0]) === "subtract"){
                    
                }
            }
            if(isset($args[1])){
                
            }
            else{
                
            }
        }
    }
    public function onEntityDamage(EntityDamageEvent $event){
        if($event->getEntity() instanceof Player){
            if($event->getCause() === EntityDamageEvent::CAUSE_CONTACT){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_ENTITY_ATTACK){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_PROJECTILE){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_SUFFOCATION){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_FALL){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_FIRE){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_FIRE_TICK){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_LAVA){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_DROWNING){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_BLOCK_EXPLOSION){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_ENTITY_EXPLOSION){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_VOID){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_SUICIDE){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_SUICIDE){
                
            }
            if($event->getCause() === EntityDamageEvent::CAUSE_CUSTOM){
                
            }
        }
    }
    
    public function onEntityRegainHealth(EntityRegainHealthEvent $event){
        if($event->getEntity() instanceof Player){
           
        }
    }
}
