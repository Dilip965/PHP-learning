<?php

//session is way to store data in different pages

//use to manage information information
//facebook.com login 'it give value"

///verifiy the user login info


session_start();
$_SESSION['1']="harry";
$_SESSION["worker"]="are great";
$_SESSION["fav_cat"]="books";

$_SESSION["rod"]=["price is 496 rupees"];




echo "WE have saved your session";






?>