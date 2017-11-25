<?php
// Récupération et réorganisation des questions
$json = file_get_contents("../Ressources/quizz.json");
$quizz = (json_decode($json, true));
$domainsNames = $quizz['domainsNames'];
$quizz = $quizz['quizz']['questions'];
asort($quizz);

//On réorganise les questions par domaine
$tmp = array("domains" => array(array(), array(), array(), array(), array()));

foreach ($quizz as $key => $value) {
    array_push($tmp["domains"][$value['domain'] - 1], $value);
}
//On stocke les questions du quizz dans une variable session
$_SESSION['quizz'] = $tmp;
$_SESSION['domainsNames'] = $domainsNames;
$_SESSION['nbQuest'] = sizeof($quizz);

for($i = 0; $i<sizeof($_SESSION['quizz']['domains']);$i++){
    shuffle($_SESSION['quizz']['domains'][$i]); // Mélange des questions
    for($j = 0; $j<sizeof($_SESSION['quizz']['domains'][$i][$j]['options']);$j++){
        shuffle_assoc($_SESSION['quizz']['domains'][$i][$j]['options']); // Mélange des réponses
    }
}

function shuffle_assoc(&$array)
{
    $keys = array_keys($array);
    shuffle($keys);
    foreach ($keys as $key) {
        $new[$key] = $array[$key];
    }
    $array = $new;
    return true;
}

?>