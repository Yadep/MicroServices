INSTRUCTION : 
D�p�ndances n�c�ssaires :
	PHP : Il faut ajouter au serveur web les d�p�ndances suivantes :  php_cassandra.dll et php_memcache pr�sente dans le dossier d�p�ndances
	      a copier dans : wamp\bin\php\php5.6.25\ext puis modifier le Php.INI et y ajouter extention = nomdeladependance.dll
	      enfin redemarrer le serveur
	Serveur CoucheBase : Pour memCache il est n�c�ssaire d'avoir un serveur couchebase qui va permettre de gerer le cache de chaque objet. https://www.couchbase.com/downloads
La documentation des API est disponible grace a swagger : \MicroServices\Documentation swagger\index.html
Pour le script php :  \TheftNotif\notif.php , il faut qu'il tourne sur une tache CRON pour linux ou bien sous une tache plannifi�e sous Windows
Les autres pages doivent etre h�berger sous un serveur WEB qui interprete le PHP (Le developpement a �t� effectu� sous WAMP)
			