INSTRUCTION : 
Dépéndances nécéssaires :
	PHP : Il faut ajouter au serveur web les dépéndances suivantes :  php_cassandra.dll et php_memcache présente dans le dossier dépéndances
	      a copier dans : wamp\bin\php\php5.6.25\ext puis modifier le Php.INI et y ajouter extention = nomdeladependance.dll
	      enfin redemarrer le serveur
	Serveur CoucheBase : Pour memCache il est nécéssaire d'avoir un serveur couchebase qui va permettre de gerer le cache de chaque objet. https://www.couchbase.com/downloads
La documentation des API est disponible grace a swagger : \MicroServices\Documentation swagger\index.html
Pour le script php :  \TheftNotif\notif.php , il faut qu'il tourne sur une tache CRON pour linux ou bien sous une tache plannifiée sous Windows
Les autres pages doivent etre héberger sous un serveur WEB qui interprete le PHP (Le developpement a été effectué sous WAMP)
			