<?php
/**
 * Created by PhpStorm.
 * User: Plouffi
 * Date: 08/12/2017
 * Time: 03:00
 */

///////////////////////////////////
//1st step: Get back data from view
///////////////////////////////////

/////////////////////////
//2nd step: Handling data
/////////////////////////
    //We destroy the session when the user log out
    session_start();
    session_destroy();

////////////////////////////
//3rd step: Return the view
////////////////////////////
	header('Location: '.$uri.'/View/login.view.php');
?>