<?php

//Include required files below (model, config...)

///////////////////////////////////
//1st step: Get back data from view
///////////////////////////////////

//We check if the have a name in the POST_ array (from the html form)
if (isset($POST_['name'])) {
    $name = $POST_['name'];
} else {
    //If not, we create a variable error
    $error = "Erreur: Le nom a été perdue dans la requête.";
}

/////////////////////////
//2nd step: Handling data
/////////////////////////

if (!isset($error)) {
    //This example doesnt to access the database
    //So we ll skip this step
}

////////////////////////////
//3rd step: Return the view
////////////////////////////

//Depending on the data valeur, we include the corresponding view
if (isset($error)) {
    include("../View/error.view.php");
} else {
    //We create an assosiative array to gather data in a unique place
    $data['name'] = $name;
    include("../View/mainExample.view.php");
}
?>
