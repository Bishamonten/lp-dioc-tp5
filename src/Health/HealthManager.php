<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 28/11/2017
 * Time: 11:03
 */

namespace App\Health;

use App\Entity\Player;
use App\Entity\Potion;
use PHPUnit\Runner\Exception;

class HealthManager
{
    private $healthCalculator;

    /**
     * HealthManager constructor.
     * @param $healthCalculator
     */
    public function __construct()
    {
        $this->healthCalculator = new HealCalculate();
    }


    public function heal(Health $health )
    {
        /**@var \App\Entity\Player $player */
        $player = $health->player;
        /**@var \App\Entity\Potion $potion */
        $potion = $health->potion;
        $count = $health->count;
        $playerPotion = null;

       $playerPotion = $this->getPlayerPotion($player, $potion);
       if($playerPotion->getCount() < $count) {
           return;
       }

       for($i = 0; $i < $count; $i++) {
           $healthPotion = $this->healthCalculator->calculate($player, $potion);

           if($healthPotion  === null){
               return;
           }
           $player->setHealthPoint($player->getHealthPoint() + $healthPotion);
       }
    }

    public function getPlayerPotion(Player $player){
        foreach ($player->getPlayerPotions() as $pp) {
            if($pp->getPotion){
                return $pp;
            }
        }
        throw new Exception("Pas de potions");
    }


}