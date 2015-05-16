<?php

namespace bundlecommand;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\Permission;
use pocketmine\plugin\PluginBase;

class BundleCommandLoader extends PluginBase{

    public function onEnable(){
        $this->saveFiles();
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function saveFiles(){
        if(file_exists($this->getDataFolder()."config.yml")){
            if($this->getConfig()->get("version") !== $this->getDescription()->getVersion()){
				$this->getServer()->getLogger()->warning("Detected an outdated configuration file for ".$this->getDescription()->getName());
				if($this->getConfig()->getNested("enable.auto-update") === true){
				    $this->saveResource("config.yml", true);
                    $this->getServer()->getLogger()->warning("Successfully updated the configuration file for ".$this->getDescription()->getName()." to v".$this->getDescription()->getVersion().".");
				}
			}
        }
        else{
            $this->saveDefaultConfig();
        }
    }
    
    public function createPermissions(){
        
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "bundlecommand"){
            if(isset($args[0])){
                if($this->getConfig()->getNested("bundle.".strtolower($args[0])) !== null){
                    
                }
                else{
                    
                }
            }
            else{
                
            }
        }
    }
}
