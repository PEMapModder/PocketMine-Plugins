<?php

namespace Commander;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Commander enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Commander disabled.");
    }
}
