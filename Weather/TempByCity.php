<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Parametre de la ville
$ville = $_GET['ville'] ;
//$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$ville.'&APPID=615d9b76eeae8b87d336cd9bc9bc2872'); 
$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Angers&APPID=615d9b76eeae8b87d336cd9bc9bc2872'); 
$jsonextract = json_decode($json);

$temp = $jsonextract->main->temp -  273.15;
$condition = $jsonextract->weather[0]->icon ;
$urlCondition =  'http://openweathermap.org/img/w/'. $condition. ".png";

$obj = new stdClass();
//$obj->label="Temp by city";
$obj->data = array(
 //   array('ville',$ville),
    array(
        "Ville", "ANGERS"
    ),
    array('temperature',$temp),
    array('urlIcon',$urlCondition),
    //and so on...
);

echo utf8_decode(json_encode($obj));


?>