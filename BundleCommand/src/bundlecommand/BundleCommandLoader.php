<?php

namespace bundlecommand;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class BundleCommandLoader extends PluginBase{

    public function onEnable(){
        $this->saveFiles();
    }
    
    public function onDisable(){
        
    }
    
    public function saveFiles(){
        if(!file_exists($this->getDataFolder()."config.yml")){
            $this->saveDefaultConfig();
        }
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
