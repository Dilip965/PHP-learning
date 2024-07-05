<?php
echo "welcome to scope and local global var in php";
$a=33;

//global
echo 33;
//php we can't take global value


function printValue(){


    // $a=55;

    global $a;
    
    echo "the value of your varibale is $a";


}
   
printValue();

// echo $a;


?>