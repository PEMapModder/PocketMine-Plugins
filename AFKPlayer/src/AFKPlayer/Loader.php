<?php

namespace AFKPlayer;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."AFKPlayer enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."AFKPlayer disabled.");
    }
}
