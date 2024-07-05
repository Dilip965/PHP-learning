<?php


echo "You are welcome to multidimensional array";
//two dimensilna array

$mulDim=array(

                    array(2,5,7,8),
            array(1,2,3,1),
    array(4,5,0,1)



);

// echo var_dump($mulDim);

echo $mulDim[0][1];

echo"<br>";
for($i=0;$i<count($mulDim);$i++)

{ 
for($j=0; $j<count($mulDim[$i]); $j++) {
 echo $mulDim[$i][$j]."  ";
  }
    echo " <br>";
}

?>
