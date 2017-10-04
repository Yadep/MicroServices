<?php
        //Chaine de connexion a la BDD
        $connexion = new PDO('cassandra:host=172.17.0.2;port=9042'); // connexion a la BDD
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        //Préparation de la requête
        $cql = $connexion->prepare("INSERT INTO theftalert (longitude,latitude,datevol) VALUES (:longitude, :latitude, :datevol);");
        //Execution de la requête avec les parametres
        $cql->execute(array(
            "longitude"=>$_POST['longitude'],
            "latitude"=>$_POST['latitude'],
            "datevol"=>$_POST['datevol']
        ));
        $nb_ligne = $cql->rowCount();

        //Affiche les erreurs s'il y en a
        print_r($cql->errorInfo());
?>