<?php
        //Chaine de connexion a la BDD
        $connexion = new PDO('cassandra:host=172.17.0.2;port=9042'); // connexion a la BDD
        //Execution de la requête
        $sql = $connexion->query("SELECT * FROM theftalert");
        //Instance d'une classe pour créer un JSON
        $obj = new stdClass();
        //Initialisation de $i
        $i = 0;
        //On parcourt tout les resultats de la requête
        while ($donnees = $sql->fetch())
        {
            //On ajoute les variables récuperer précédemment
            //$i pour pouvoir ajouter autant de chaine que de ligne
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
            //On indente $i
            $i++;
        }
        //On retourne le JSON encoder
        echo json_encode($obj);
?>
