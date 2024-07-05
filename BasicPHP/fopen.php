<?php



echo "you are learning fopen and fclose";



$fpoiter=fopen('dilip.txt','r');



$content=fread($fpoiter,filesize("dilip.txt"));

echo $content;

fclose($fpoiter);
?>