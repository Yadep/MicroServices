INSTRUCTION : 
D�p�ndances n�c�ssaires :
	PHP : Il faut ajouter au serveur web les d�p�ndances suivantes :  php_cassandra.dll et php_memcache pr�sente dans le dossier d�p�ndances
	      a copier dans : wamp\bin\php\php5.6.25\ext puis modifier le Php.INI et y ajouter extention = nomdeladependance.dll
	      enfin redemarrer le serveur
	Serveur CoucheBase : Pour memCache il est n�c�ssaire d'avoir un serveur couchebase qui va permettre de gerer le cache de chaque objet. https://www.couchbase.com/downloads
La documentation des API est disponible grace a swagger : \MicroServices\Documentation swagger\index.html
Pour le script php :  \TheftNotif\notif.php , il faut qu'il tourne sur une tache CRON pour linux ou bien sous une tache plannifi�e sous Windows
Les autres pages doivent etre h�berger sous un serveur WEB qui interprete le PHP (Le developpement a �t� effectu� sous WAMP)
Dans le dossier \Microservices\Cassandra\ se trouve Commandes.txt qui permettent d'installer et de cr�er la base de donn�e n�c�ssaire au bon fonctionnement de TheftAlertNoSQL
Dans le dossier \MicroServices\TheftAlert se trouve theftalert.sql qui permet d'installer la base de donn�es pour getTheft et postTheft

Notes : 
Il existe plusieurs version de TheftAlert : 
pour getTheft : 
	GetTheft.php : Utilise une BDD MySQL pour r�cuperer tout les vols de v�lo
	GetTheftMemCached : V�rifie sur le serveur CoucheBase si une version qui n'a pas "timeout" existe et l'affiche sinon, effectue la requete, la stock (sous format JSON) en cache puis affiche le JSON
	GetTheftNoSQL : Utilise une BDD NoSQL pour r�cuperer tout les vols de v�lo
pour postTheft : 
	postTheft : Insert dans une BDD MySQL un vol de v�lo
	postTheft : M�me Chose mais sur une BDD NoSQL				