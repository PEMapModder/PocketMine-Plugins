<?php

namespace planb;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class PlanBLoader extends PluginBase{
    
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
            if($sender instanceof Player){
                if($this->backup->exists(strtolower($sender->getName()))){
                    $sender->sendMessage("§eRestoring the OP status of all OPs...");
                    foreach($this->getServer()->getOnlinePlayers() as $player){
                        if($this->backup->exists(strtolower($player->getName()))){
                            if($player->isOp()){
                            }
                            else{
                                $player->setOp(true);
                                $player->sendMessage("§aYour OP status has been restored.");
                                $sender->sendMessage("§aRestored ".$player->getName()."'s OP status.");
                            }
                        }
                        else{
                            if($player->isOp()){
                                $player->setOp(false);
                                $player->kick("Detected potential hacker");
                                $this->getServer()->broadcastMessage("§eDeopped and kicked potential hacker: ".$player->getName());
                            }
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
}
