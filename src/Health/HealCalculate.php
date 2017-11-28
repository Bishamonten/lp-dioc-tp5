<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 28/11/2017
 * Time: 11:17
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\Potion;

class HealCalculate
{
    public function calculate( Player $player, Potion $potion){
        $healthPoint = $player->getHealthPoint();
        if ($healthPoint > $potion->getLimite()) {
            return null;
        }

        if (($healthPoint+$potion->getLimite())) {
            return null;
        }

        if(($healthPoint+$potion->getHealthPoint() > $potion->getLimite())){
            return $potion->getLimite() - $healthPoint;
        }

        return $potion->getHealthPoint();



    }
}