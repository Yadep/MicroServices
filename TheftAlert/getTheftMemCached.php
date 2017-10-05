<?php
        //On instancie Memcached
        $memcache = new Memcached();
        //On lui attribue la connexion au serveur
        $memcache->addServer('localhost:8091',11211) or die ("Connexion impossible au serveur memcached");
        //Chaine de connexion a la BDD
        $connexion = new PDO("mysql:host=localhost;dbname=theftalert","root",""); // connexion a la BDD
        //Stockage de la requete
        $requete = "SELECT * FROM theftalert";
        //On prend le cache sur le serveur avec la clé qui est la requette
        $getCacheDetail = $memcache->get($requete);
        
        //On test si le cache est présent 
        if($getCacheDetail)
        {
            echo $getCacheDetail;
        }
        //Si il n'existe pas on le créée
        else 
        {
           //Temps en seconde de la durée du cache :
           $temps = 1000;
           //Execution de la requête
           $sql = $connexion->query($requete);
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
           //On stocke le JSON set(clé,valeur,temps)
           $memcache->set($requete,json_encode($obj),$temps);
           //On retourne le JSON encoder
           echo json_encode($obj);
           
        }
       
?>
