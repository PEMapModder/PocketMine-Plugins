<?php

namespace spreadfreeze;

use pocketmine\block\Grass;
use pocketmine\block\Lava;
use pocketmine\block\Mycelium;
use pocketmine\block\Podzol;
use pocketmine\block\Water;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\event\block\LeavesDecayEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function createFiles(){
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder());
        }
        if(!file_exists($this->getDataFolder()."settings.yml")){
            $this->settings = new Config($this->getDataFolder()."settings.yml", Config::YAML);
            $this->settings->set("version", $this->getDescription()->getVersion());
            $this->settings->save();
            $this->getServer()->getLogger()->notice("Created new file: SpreadFreeze\\settings.yml");
        }
    }
    
    public function openFiles(){
        fopen($this->getDataFolder()."settings.yml");
    }
    
    public function closeFiles(){
        fclose($this->getDataFolder()."settings.yml");
    }
    
    public function updateFiles(){
        if(!$this->settings->get("version") === $this->getDescription()->getVersion()){
            unlink($this->getDataFolder()."settings.yml");
            $this->createFiles();
            $this->getServer()->getLogger()->warning("Updated file: SpreadFreeze\\settings.yml");
        }
    }
}
