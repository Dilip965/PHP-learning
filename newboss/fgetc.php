<?php

$fpointer=fopen("dilip.txt","r");

// // echo fgets($fpointer);
// while($a=fgetc($fpointer)){

//     echo $a;
//     break;
// }

// echo"End of the file has reached";
//write a program which read the content of file until has been encountered

while($a=fgetc($fpointer)){


    echo $a;

    if($a=="."){

        break;
    }
}




?>