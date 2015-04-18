<?php

namespace timeedit;

use pocketmine\event\Listener;
use timeedit\TimeEditAPI;

class TimeEditListener implements Listener{

    public function __construct(TimeEditAPI $plugin){
        $this->plugin = $plugin
    }
}
