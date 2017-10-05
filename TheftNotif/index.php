<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        //Chaine de connexion a la BDD
        $connexion = new PDO("mysql:host=localhost;dbname=theftalert","root",""); // connexion a la BDD
        //Execution de la requête
        $sql = $connexion->query("SELECT id FROM theftalert ORDER BY id DESC LIMIT 0, 1;");
        $id = $sql->fetch();
        $idvrai = $id['id'];
        
        $i = 0;
     
        while($i = 1){
            sleep(1);
            $sqlcompare = $connexion->query("SELECT id FROM theftalert ORDER BY id DESC LIMIT 0, 1;"); 
            $id1 = $sqlcompare->fetch();
            $idlast = $id1['id'];
            
            if($idvrai =! $idlast){
                // appel du mailler
                
                
                $idvrai = $idlast;
            }
        }
        
        