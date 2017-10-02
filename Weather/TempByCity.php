<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Si l'on souhaite rendre le parametre ville dynamique, il faut décommenter
//Parametre de la ville
//$ville = $_GET['ville'] ;
//$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$ville.'&APPID=615d9b76eeae8b87d336cd9bc9bc2872'); 
//Récupération des données depuis l'API openweathermap
$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Angers&APPID=615d9b76eeae8b87d336cd9bc9bc2872'); 
//Création d'un objet JSON récuperer au dessus
$jsonextract = json_decode($json);

//Recupération de la temperature et conversion K vers degrès celcius
$temp = $jsonextract->main->temp -  273.15;
//Récupération de l'icon (condition)
$condition = $jsonextract->weather[0]->icon ;
//cast de l'url pour la condition
$urlCondition =  'http://openweathermap.org/img/w/'. $condition. ".png";

//Instance d'une classe pour créer un JSON
$obj = new stdClass();
//On ajoute les variables récuperer précédemment
$obj->data = array(
 //   array('ville',$ville),
    array(
        "Ville", "ANGERS"
    ),
    array('temperature',$temp),
    array('urlIcon',$urlCondition),
    //and so on...
);
//On retourne le JSON encoder
echo utf8_decode(json_encode($obj));


?>