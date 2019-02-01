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

function getMonsters_PDO(){
    //Connexion à la base de données "mymonsters" via une instance de la classe PDO
     $base = new PDO('mysql:host=localhost;dbname=mymonsters', 'root', '');
     //initialisation d'une requête pour récupérer les monstres de ma base
     $query = $base->query("SELECT * FROM monsters");
     $monsters = array();

     foreach($query->fetchAll() as $monster){
        //fetchAll() retourne un tableau contenant des tableaux avec le nom, la force, la vie et le type du monstre
        $monsters[] = new Monster($monster['name'], $monster['strength'],$monster['life'],$monster['type']);
        //pour chaque tableau on crée une instance de Monstre en lui donnant ses attributs en paramètre du constructeur
     }
     return $monsters;
}


function addMonster($name,$strength,$life,$type) {
    $base = new PDO('mysql:host=localhost;dbname=mymonsters', 'root', '');
    $query = $base->prepare('INSERT INTO monsters VALUES (?,?,?,?)');
    //preparation d'une requête pour insérer des monstres dans la table monsters
    $query->execute(array($name,$strength,$life,$type));
    //on execute la requête préparée en fournissant un tableau avec les informations du monstre qui va être ajouté
}

function deleteMonster($name) {
    $base = new PDO('mysql:host=localhost;dbname=mymonsters', 'root', '');
    $query = $base->prepare('DELETE FROM monsters WHERE name = ?');
    $query->execute(array($name));
}