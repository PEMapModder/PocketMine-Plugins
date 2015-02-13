<?php

namespace iLocate;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."iLocate enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."iLocate disabled.");
    }
}
