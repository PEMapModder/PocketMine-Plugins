<?php

namespace IPTag;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."IPTag enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."IPTag disabled.");
    }
}
