<?php
        $connexion = new PDO("mysql:host=localhost;dbname=theftalert","root",""); // connexion a la BDD
        $sql = $connexion->query("SELECT * FROM theftalert");
        //Instance d'une classe pour créer un JSON
        $obj = new stdClass();
        $i = 0;
        while ($donnees = $sql->fetch())
        {
            //On ajoute les variables récuperer précédemment
            $obj->data[$i] = array(
                 array(
                    "longitude", $donnees['longitude']
                ),
                array(
                    "latitude", $donnees['latitude']
                ),
                array(
                    "datevol", $donnees['datevol']
                )
            );
            //On retourne le JSON encoder

            $i++;



        }
        echo json_encode($obj);
?>
