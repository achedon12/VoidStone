<?php

namespace achedon\voidstone\items;

use pocketmine\block\VanillaBlocks;
use pocketmine\item\Item;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemUseResult;
use pocketmine\item\VanillaItems;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\player\Player;

class voidstone extends Item{

    protected $lore = [
        "",
        "0 cobble"
    ];

    public function __construct()
    {
        parent::__construct(new ItemIdentifier(VanillaItems::HEART_OF_THE_SEA()->getId(),VanillaItems::HEART_OF_THE_SEA()->getMeta()),"void stone");
        $nbt = $this->getNamedTag();
        $nbt->setTag("param",CompoundTag::create()
        ->setInt(VanillaBlocks::COBBLESTONE()->getId(),0)
        );
        $this->setNamedTag($nbt);
    }

    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult
    {
        $nbt = $this->getNamedTag();
        $player->sendTip("§e".$nbt->getTag("param")->getInt(VanillaBlocks::COBBLESTONE()->getId())." cobble");
        return parent::onClickAir($player, $directionVector);
    }

}