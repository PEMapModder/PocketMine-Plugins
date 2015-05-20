<?php

namespace advancedtext;

use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use advancedtext\command\AdvancedTextCommand;
use advancedtext\AdvancedTextListener;

class AdvancedTextAPI extends PluginBase{
    
    public function onEnable(){
        $this->saveFiles();
        $this->command = new AdvancedTextCommand($this);
        $this->listener = new AdvancedTextListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
    }
    
    public function broadcastPopup($message){
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendPopup($message);
        }
    }
    
    public function broadcastTip($message){
    	foreach($this->getServer()->getOnlinePlayers() as $player){
    	    $player->sendTip($message);
    	}
    }
    
    public function createFloatingTextParticle(Vector3 $vector, $text, $title){
    	$particle = new FloatingTextParticle($vector, $text, $title);
    }
}
