<?php
include_once("View/header.view.php");

$json = file_get_contents("Plugin/quizz.json");

$quizz = (json_decode($json, true));
//print_r($quizz);
//print_r($quizz['quizz']['domaine'][0]['questions'][0]);
$quizz = $quizz['quizz']['domaine'];
$domaine = 0;
$question = 0;
$rep = 0;
echo('<form>');
foreach ($quizz as $key => $value) {
    echo('<div>');
    shuffle_assoc($value['questions']);
    echo('<h1>' . $value['name'] . '</h1>');
    //print_r($value);
    foreach ($value['questions'] as $k => $v) {
        echo('<fieldset><legend>Question ' . ($question + 1) . ': </legend>' . $v['question']);
        shuffle_assoc($v['options']);

        foreach ($v['options'] as $q => $r) {
            $id = $domaine . '.' . $question . '.' . $rep;
            if (in_array($q, $v['answer'])) {
                echo('<div><input type="checkbox" checked id="' . $id . '"><label for="' . $id . '">' . $r . '</label></div>');
            } else {
                echo('<div><input type="checkbox" id="' . $id . '"><label for="' . $id . '">' . $r . '</label></div>');
            }
            $rep++;
        }
        echo('</fieldset>');

        $rep = 0;
        $question++;
    }
    $question = 0;
    $domaine++;
    echo('</div>');
}
echo('</form>');

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

include_once("View/footer.view.php");
?>