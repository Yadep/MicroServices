<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$Oldxml = simplexml_load_file("http://vigilance.meteofrance.com/data/NXFR49_LFPW_.xml?9326350.xml") or die("Error: Cannot create object");
$pheno = array();
$pheno1 = array();

foreach ($Oldxml->PHENOMENE as $phen) {
    if ($phen['departement'] == 49) {
        //phenomene 3 = Tempete
        if($phen['phenomene'] == 3){ 
            $pheno['departement'] = $phen['departement'];
            $pheno['phenomene'] = $phen['phenomene'];
            $pheno['couleur'] = $phen['couleur'];
            $pheno['dateDebutEvtTU'] = $phen['dateDebutEvtTU'];
            $pheno['dateFinEvtTU'] = $phen['dateFinEvtTU'];
        }
        // phenomene 4 = innondations
        if($phen['phenomene'] == 4){
            $pheno1['departement'] = $phen['departement'];
            $pheno1['phenomene'] = $phen['phenomene'];
            $pheno1['couleur'] = $phen['couleur'];
            $pheno1['dateDebutEvtTU'] = $phen['dateDebutEvtTU'];
            $pheno1['dateFinEvtTU'] = $phen['dateFinEvtTU'];
        }
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
        "Tempete", $pheno['couleur']
    ),
    array(
        "innondation", $pheno1['couleur']
    )
);

//On retourne le JSON encoder
echo json_encode($obj);

