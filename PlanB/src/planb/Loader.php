<?php

namespace planb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Loader extends PluginBase{
    
    public $backup;
    
    public function onEnable(){
    	@mkdir($this->getDataFolder());
        $this->backup = new Config($this->getDataFolder()."backup.txt", Config::ENUM);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->backup->save();
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "planb"){
            if(isset($args[0])){
                if(strtolower($args[0]) === "help"){
                    $sender->sendMessage("§bPlanB commands");
                    $sender->sendMessage("§a/planb help §c- §fShows all sub-commands for /planb");
                    $sender->sendMessage("§a/planb restore §c- §f");
                    return true;
                }
                if(strtolower($args[0]) === "restore"){
                    if($sender instanceof Player){
                        if($this->backup->exists(strtolower($sender->getName()))){
                            $sender->sendMessage("§eRestoring the OP status of all OPs...");
                            foreach($this->getServer()->getOnlinePlayers() as $players){
                                if($this->backup->exists(strtolower($players->getName()))){
                                    if($players->isOp()){
                                    }
                                    else{
                                        $players->setOp(true);
                                        $players->sendMessage("§aYour OP status has been restored.");
                                        $sender->sendMessage("§aRestored ".$players->getName()."'s OP status.");
                                    }
                                }
                                else{
                                    if($players->isOp()){
                                        $players->setOp(false);
                                        $players->kick("Detected potential hacker");
                                        $this->getServer()->broadcastMessage("§eDeopped and kicked potential hacker: ".$players->getName());
                                    }
                                }
                            }
                        else{
                            $sender->sendMessage("§cYou don't have permissions to restore OP statuses.");
                        }
                    }
                    else{
                        $sender->sendMessage("§cPlease run this command in-game.");
                    }
                    return true;
                }
            }
            else{
                $sender->sendMessage("§bPlanB commands");
                $sender->sendMessage("§a/planb help §c- §fShows all sub-commands for /planb");
                $sender->sendMessage("§a/planb restore §c- §f");
            }
        }
    }
}
