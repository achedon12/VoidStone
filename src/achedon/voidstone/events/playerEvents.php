<?php

namespace achedon\voidstone\events;

use achedon\voidstone\items\voidstone;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;

class playerEvents implements Listener{

    public function onBreak(BlockBreakEvent $event){
        $block = $event->getBlock();
        $player = $event->getPlayer();
        if($player->getInventory()->getHotbarSlotItem(8) instanceof voidstone){
            if($block->getId() === VanillaBlocks::STONE()->getId()){
                $event->setDrops([]);
                $voidstone = $player->getInventory()->getHotbarSlotItem(8);
                $nbt = $voidstone->getNamedTag();
                $nbt->getTag("param")->setInt(VanillaBlocks::COBBLESTONE()->getId(),$nbt->getTag("param")->getInt(VanillaBlocks::COBBLESTONE()->getId()) + 1);
                $voidstone->setNamedTag($nbt);
                $voidstone->setLore(["","§7{$nbt->getTag("param")->getInt(VanillaBlocks::COBBLESTONE()->getId())} cobble"]);
                if($player->getInventory()->getItem(8) instanceof voidstone){
                    $player->getInventory()->setItem(8,$voidstone);
                }
            }
        }
    }
}