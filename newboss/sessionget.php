<?php

//session is way to store data in different pages

//use to manage information information
//facebook.com login 'it give value"

///verifiy the user login info
session_start();



echo "Cograte for learning php dear ", $_SESSION['1'];

echo "<br>";
echo "we  are glad you like  ",$_SESSION['fav_cat'];

// session_destroy();
// $_SESSION["fav cat"]="books";

// echo "WE have saved your session";






?>