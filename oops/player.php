<?php

class Player{

//properties

    public $name;
 public $speed=3;
//method

function set_Name($name){

    $this->name=$name;


}

function get_name(){

    reutn $this->name;
}

//object call

$player1=new player();
$player->set_name("Dilip");
echo $player1->get_name();



}


?>