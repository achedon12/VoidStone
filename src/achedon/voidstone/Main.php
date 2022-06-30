<?php

namespace achedon\voidstone;

use achedon\voidstone\events\playerEvents;
use achedon\voidstone\items\voidstone;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    protected function onEnable(): void
    {
        $this->getLogger()->info("§2Plugin VoidStone on");

        ItemFactory::getInstance()->register(new voidstone(),true);

        $this->getServer()->getPluginManager()->registerEvents(new playerEvents(),$this);
    }

    protected function onDisable(): void
    {
        $this->getLogger()->info("§4Plugin VoidStone off");
    }
}