<?php

namespace serverhelp;

use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class ServerHelpLoader extends PluginBase implements Listener{

    public function onEnable(){
        $this->saveFiles();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
      	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        
    }
    
    public function onPlayerCommandPreprocess(PlayerCommandPreprocess $event){
        $command = explode(" ", strtolower($event->getMessage()));
        if($command[0] === "/help"){
            $event->setCancelled(true);
            if(isset($command[1])){
                if(isset($this->getConfig()->getNested("help.".$command[1]))){
                    foreach($this->getConfig()->getNested("help.".$command[1]) as $message){
                        $event->getPlayer()->sendMessage($message);
                    }
                }
                else{
                    $event->getPlayer()->sendMessage($this->getConfig()->getNested("message.on-error"));
                }
            }
            else{
                if(isset($this->getConfig()->getNested("help.1")){
                    foreach($this->getConfig()->getNested("help.1") as $message){
                        $event->getPlayer()->sendMessage($message);
                    }
                }
                else{
                    $event->getPlayer()->sendMessage($this->getConfig()->getNested("message.on-error"));
                }
            }
        }
    }
}
