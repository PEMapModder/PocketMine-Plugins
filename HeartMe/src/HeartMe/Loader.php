<?php

namespace HeartMe;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Loader extends PluginBase{
    
    public $female;
    
    public $male;
    
    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->female = new Config($this->getDataFolder()."female.txt", Config::ENUM);
        $this->male = new Config($this->getDataFolder()."male.txt", Config::ENUM);
        $this->getLogger()->info(TextFormat::GREEN."HeartMe enabled.");
    }
    
    public function onDisable(){
        $this->female->save();
        $this->male->save();
        $this->getLogger()->info(TextFormat::RED."HeartMe disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($sender instanceof Player){
            if(strtolower($command->getName()) === "date"){
                if(isset($args[0])){
                    
                }
            }
            if(strtolower($command->getName()) === "dump"){
                if(isset($args[0])){
                    
                }
            }
            if(strtolower($command->getName()) === "gender"){
                if(isset($args[0])){
                    
                }
            }
        }
        else{
            $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
            return true;
        }
    }
}
