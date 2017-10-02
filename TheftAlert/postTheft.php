<?php
        $connexion = new PDO("mysql:host=localhost;dbname=theftalert","root",""); // connexion a la BDD
        $sql = $connexion->prepare("INSERT INTO theftalert (longitude,latitude,datevol) VALUES (".$_POST['longitude'].", ".$_POST['latitude'].", ".$_POST['datevol'].")");
        $sql->execute();
        $nb_ligne = $sql->rowCount();

echo "INSERT INTO theftalert (longitude,latitude,datevol) VALUES (".$_POST['longitude'].", ".$_POST['latitude'].", '".$_POST['datevol']."')";
?>