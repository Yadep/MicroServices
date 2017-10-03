<?php
        //Chaine de connexion a la BDD
        $connexion = new PDO("mysql:host=localhost;dbname=theftalert","root",""); // connexion a la BDD
        //Préparation de la requête
        $sql = $connexion->prepare("INSERT INTO theftalert (longitude,latitude,datevol) VALUES (:longitude, :latitude, :datevol)");
        //Execution de la requête avec les parametres
        $sql->execute(array(
            "longitude"=>$_POST['longitude'],
            "latitude"=>$_POST['latitude'],
            "datevol"=>$_POST['datevol']
        ));
        $nb_ligne = $sql->rowCount();

        //Affiche les erreurs s'il y en a
        print_r($sql->errorInfo());
?>