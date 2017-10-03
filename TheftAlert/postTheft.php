<?php
        $connexion = new PDO("mysql:host=localhost;dbname=theftalert","root",""); // connexion a la BDD
        $sql = $connexion->prepare("INSERT INTO theftalert (longitude,latitude,datevol) VALUES (:longitude, :latitude, :datevol)");
        $sql->execute(array(
            "longitude"=>$_POST['longitude'],
            "latitude"=>$_POST['latitude'],
            "datevol"=>$_POST['datevol']
        ));
        $nb_ligne = $sql->rowCount();

        
        print_r($sql->errorInfo());
        echo $nb_ligne;
echo "INSERT INTO theftalert (longitude,latitude,datevol) VALUES (".$_POST['longitude'].", ".$_POST['latitude'].", '".$_POST['datevol']."')";
?>