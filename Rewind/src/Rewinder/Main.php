<?php

namespace Rewinder;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Rewinder enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Rewinder disabled.");
    }
}
