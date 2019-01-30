<?php

require __DIR__ . '/monsters.php';

function getMonsters()
{
    $monster1 = new Monster("Jules", 500, 700, "Water");
    $monster2 = new Monster("Fiora", 1000, 800, "Warrior");
    $monster3 = new Monster("Thunderbird", 900, 400, "Electr");
    $monster4 = new Monster("Wendigos", 300, 300, "Fire");
    $monster5 = new Monster("Sirrush", 200, 300, "Fire");
    return array($monster1,$monster2,$monster3,$monster4,$monster5);
}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function fight(Monster $firstMonster, Monster $secondMonster)
{
    $firstMonsterLife = $firstMonster->getLife();
    $secondMonsterLife = $secondMonster->getLife();

    while ($firstMonsterLife > 0 && $secondMonsterLife > 0) {
        $firstMonsterLife = $firstMonsterLife - $secondMonster->getStrength();
        $secondMonsterLife = $secondMonsterLife - $firstMonster->getStrength();
    }

    if ($firstMonsterLife <= 0 && $secondMonsterLife <= 0) {
        $winner = null;
        $looser = null;
    } elseif ($firstMonsterLife <= 0) {
        $winner = $secondMonster;
        $looser = $firstMonster;
    } else {
        $winner = $firstMonster;
        $looser = $secondMonster;
    }

    return array(
        'winner' => $winner,
        'looser' => $looser,
    );
}