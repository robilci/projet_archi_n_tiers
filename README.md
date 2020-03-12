# projet_archi_n_tiers
Projets développé par Dounya ENNECH, Samy BADACHE et Robin JAKUBCZAK.


Afin de tester le site, veuillez suivre les différentes instructions suivantes :

	- installez la base de données ebrigade
	- créez une base de données sur MariaDB ayant pour nom action_reports (par exemple)
	- Configurez la connexion à la base de donnée action_reports dans le fichier de configuration suivant : action_reports/app/utils/config/config.php
	- Configurez la connexion de l'API à la base ebrigade dans le fichier de configuration suivant : api/database/config.php
	- Afin de simuler l'hébergement des deux applications sur un serveur distant, veuillez créer deux hôtes virtuels. Pour cela, démarrer wamp, allez sur localhost, dans la catégorie "outils" cliquez sur "ajouter un virtualhost". Mettez le chemin absolu du dossier public (votrePc/.../action_reports/public) de l'application action_reports dans le champ suivant "Chemin complet absolu du dossier VirtualHost". Finalement, donnez un nom à votre hôte (actionreports par exemple) puis cliquez sur "Démarrez la création du virtual host".
	- Faite de même avec l'application API en mettant le chemin absolu du dossier de l'application API (attention : pas de dossier public ici). Donnez le nom "api" à votre hôte puis cliquez sur "Démarrez la création du virtual host".
	- Redémarrer les services wamp
	- Une fois les services redémarrés et les hôtes virtuels crées, lancez le synchronisation via l'API en appellant le lien suivant "api/synchronize". Cette fonction va synchroniser les deux base de données si les configurations des connexions des base de données sont bonnes.
	- Les données sont maintenant synchronisées et le site peut être testé en appelant le nom de l'hôte virtuel de l'application action_reports. 

