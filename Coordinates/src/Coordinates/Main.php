<?php

namespace Coordinates;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN."Coordinates enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."Coordinates disabled.");
    }
}
