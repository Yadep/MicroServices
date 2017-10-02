<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Récupération des données depuis l'API prevair
$json = file_get_contents('http://www2.prevair.org/ineris-web-services.php?url=atmo&date=20171002');
//Création d'un objet JSON récuperer au dessus
$jsonextract = json_decode($json);

//On parcoure la liste contenu dans le json, ville par ville
foreach($jsonextract as $j){
    //Si la ville est ANGERS
    if($j[4] == "ANGERS"){
        //On récupere incide et le pm10 que l'on stock dans des variables
        $incide = $j[7];
        $pm10 = $j[11];
    }     
}

//Instance d'une classe pour créer un JSON
$obj = new stdClass();
//On ajoute les variables récuperer précédemment
$obj->data = array(
     array(
        "Ville", "ANGERS"
    ),
    array(
        "Incide", $incide
    ),
    array(
        "PM10", $pm10
    )
);
//On retourne le JSON encoder
echo json_encode($obj);


