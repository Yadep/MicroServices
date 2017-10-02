<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$json = file_get_contents('http://www2.prevair.org/ineris-web-services.php?url=atmo&date=20171002');

$jsonextract = json_decode($json);
//var_dump($jsonextract);

foreach($jsonextract as $j){
    if($j[4] == "ANGERS"){
        $incide = $j[7];
        $pm10 = $j[11];
    }     
}

$obj = new stdClass();
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

echo json_encode($obj);


