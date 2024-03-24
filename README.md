# TP Azure - Mémoire 5ème année

# Étape 1 : Prérequis

- Posséder un compte Azure https://portal.azure.com
- Posséder un compte Github https://github.com/

# Étape 2 : Créer un abonnement

- Créer un abonnement. Lorsque vous êtes étudiant, vous pouvez bénéficier de l’offre gratuite disponible ici : https://portal.azure.com/#view/Microsoft_Azure_Education/EducationMenuBlade/~/overview

# Étape 3 : Créer un groupe de ressource

Le groupe de ressource permet de regrouper dans un projet les ressources nécessaires. Cela vous permettra de supprimer en deux cliques l'ensemble du projet pour éviter de payer inutilement.
Rendez-vous ici : https://portal.azure.com/#view/HubsExtension/BrowseResourceGroups

Vous pouvez le nommer "TP_Azure"

![Groupe de ressource](https://acenox.fr/memoire/Groupe%20de%20ressource.png)

# Étape 4 : Créer l'application Web

- Se rendre dans "App services" : https://portal.azure.com/#view/HubsExtension/BrowseResource/resourceType/Microsoft.Web%2Fsites
- Cliquer sur "Créer" une nouvelle application web
- Nom : tp<prénom><numéro> ***/!\ L'objectif est que le nom soit unique /!\***
- Publier : Code
- Pile d'éxécution : PHP 8.2
- Système d'exploitation : Linux
- Région : France Central

![Application Web](https://acenox.fr/memoire/Application_web.png)

# Étape 5 : Fork le projet

- Rendez-vous ici : https://github.com/JorisPV/TP_azure
- Cliquer sur le symbole "Fork" se trouvant en haut à droite

![Fork](https://acenox.fr/memoire/fork.png)

- Récupérer le lien de votre projet Github cela devrait être : https://github.com/<pseudo>/TP_Azure

# Étape 6 : Relier Github x Azure

- Rendez-vous dans la catégorie "Déploiement"
- Activer "Github Actions"
- Compte : Connecter votre compte Github
- Organisation : Sélectionner votre compte github
- Dépôt : Sélectionner TP_Azure
- Branche : Main

![Deploiement](https://acenox.fr/memoire/Deploiement.png)

# Étape 7 : Vérifier et créer

- Cliquer sur "Vérifier et créer"
- Puis cliquer sur "Créer"
- Attendre que le déploiement se termine

![Verifier et creer](https://acenox.fr/memoire/Deploiement_v2.png)

Une fois terminé, vous pouvez accéder à votre ressource

![Acceder a la ressource](https://acenox.fr/memoire/fin.png)

# Étape 8 : Attendre le déploiement de l'application

Maintenant que votre ressource est crée, l'application sera déployée par rapport à votre github.

![Attente fin deploiement](https://acenox.fr/memoire/att_fin_deploiement.png)

# Étape 9 : Accéder à la ressource

Une fois le déploiement terminé, vous pourrrez accéder à votre site : https://tp<prénom><numéro>.azurewebsites.net

![Fin deploiement](https://acenox.fr/memoire/Deploiement_ok.png)

Félicitations le site est déployé 🎉​ Vous pouvez désormais effectuer des modifications sur votre réportoire Github et les modifications seront automatiquement déployés sur votre site internet Azure.
Pour la suite du TP, nous allons accentuer la sécurité de notre application web déployée.

# Étape 10 : Keyvault

Nous aurons besoin de générer un certificat SSL, pour cela nous allons utiliser Azure Keyvault.

https://portal.azure.com/#create/Microsoft.KeyVault

- Abonnement : Azure for Students
- Groupe de ressource : TP-Azure
- Nom : TP-Azure-Keyvault
- Region : France Central
- Niveau tarifaire : Standard

Laisser tout les autres paramètres par défaut puis cliquer sur "Vérifier + créer" puis cliquer sur "Créer"

![Keyvault](https://acenox.fr/memoire/keyvault.png)

Une fois le déploiement terminé, cliquer sur "Accéder la ressource"

- Se rendre dans "Configuration de l'accès"
- Sélectionner "Stratégie d'accès au coffre"
- Cliquer sur "Appliquer"

L'objectif ici est de pouvoir contrôler le Keyvault directement dessus sans devoir utiliser des rôles Azure, cela simplifiera un petit peu notre TP.

![Keyvault Accès](https://acenox.fr/memoire/keyvault-acces.png)

- Se rendre dans "Stratégie d'accès" (si vous rencontrez une erreur, merci d'actualiser la page en faisant F5)
- Cliquer sur "Créer"
- Sélectionner "Gestion des clés, des secrets et des certificats"
- Puis cliquer sur "Suivant"

Vous aurez maintenant besoin d'accorder les droits à votre application, pour cela vous aurez besoin de chercher l'identité que vous trouverez dans votre groupe de ressource.

![Keyvault Accès](https://acenox.fr/memoire/id.png)

Ici, le nom est : tpjorisv2-id-987f

- Puis cliquer sur "Suivant"
- puis "Créer"

Vous devrez refaire la même étape à partir de "Stratégie d'accès" et d'ajouter l'adresse e-mail de votre compte Azure
Ici, cela sera jparmentier1@myges.fr , voici ce que vous devriez avoir :

![Keyvault Accès v2](https://acenox.fr/memoire/acces_keyvault.png)

- Se rendre dans "Certificats"
- Cliquer sur "Générer un certificat"
- Nom du certificat : "SSL-TP-AZURE"
- Type de certificat : Certificat auto-signé
- OBjet : CN=tpjorisv2.azurewebsites.net ⚠️​ Vous devez remplacer cet URL par celle de votre site que vous trouverez dans votre application web ⚠️
- Le reste laisser par défaut
- Cliquer sur "Créer"

# Etape 11 : Passerelle d'application

La passerelle d'application est un service de réseau. Celui-ci permet de se positionner comme un point d'entrée stratégique pour les applications Web. Il intégre des fonctionnalités telles que l'optimisation des performances, la gestion du trafic et la sécurité avec l'ajout d'un WAF (web application firewall).

https://portal.azure.com/#create/Microsoft.ApplicationGateway-ARM

- Abonnement : Azure for Students
- Groupe de ressoruce : TP-Azure
- Nom de la passerelle : tpazureag
- Région : France Central
- Niveau : WAF V2
- Mise à l'échelle automatique : Sélectionner "Non"
- Nombre d'instances : 1
- Zones : Sélectionner les trois zones
- HTTP2 : Désactivé
- Stratégie WAf : Cliquer sur "Créer" --> Nom : TP-AZURE-WAF
- Réseau Virtuel : Cliquer sur "Créer" --> Nom : TP-AZURE-VNET
- Cliquer sur "Suivant Serveurs frontaux"

![Application Gateway](https://acenox.fr/memoire/ag1.png)

Nous allons désormais configurer le serveur frontal

- Type d'adresse IP front-end : Public
- Adresse publique : Cliquer sur "Ajouter"
- Définir le nom en "IP1"
- Cliquer sur "Suivant Backend"

![Application Gateway 2](https://acenox.fr/memoire/ag2.png)

- Cliquer sur "Ajouter un pool de backends"
- Nom : TP-AZURE-BACKEND
- Type de cible : Sélectionner "App service" --> Sélectionner le nom de votre application web ici : tpjorisv2
- Cliquer sur "Ajouter" puis "Suivant --> Configuration"

![Application Gateway 3](https://acenox.fr/memoire/ag3.png)

- Cliquer sur "Ajouter une règle de routage"
- Nom : TP-Azure-Regles
- Priorité : 1
- Nom de l'écouteur : TP-Azure-listener
- Adresse IP Front-End : Publique
- Protocole : HTTPS
- Port : 443
- Sélectionner "Choisir un certificat à partir d'Azure Keyvault"
- Nom : TP-Azure-certif
- Identité managé : Sélectionner votre identité (ici : tpjorisv2-id-987f)
- Coffre de clé : Sélectionner votre Coffre : TP-Azure-Keyvault
- Certificat : SSL-TP-Azure
- Type d'écouteur : De base

![Application Gateway 4](https://acenox.fr/memoire/ag4.png)

⚠️ Ne pas cliquer sur "Ajouter" ⚠️

- Sélectionner "Cibles Back-end"
- Cible de back-end : Sélectionner "TP-AZURE-BACKEND"
- Paramètre du back-end : Cliquer sur "Ajouter"
- Nom : TP-AZURE-SETTINGS-BACKEND
- Protocole : HTTPS
- Port principal : 443
- Le certificat du serveur principal est émis par une autorité de certification connue : Oui
- Laisser le reste par défaut sauf "Remplacer par le nouveau nom d'hôte" mettre "oui" puis cliquer sur "Choisir un nom d'hôte à partir d'une cible back-end"
- Cliquer sur "Ajouter" 2x
- Cliquer sur "Suivant Etiquettes"

![Application Gateway 5](https://acenox.fr/memoire/ag5.png)

- Cliquer sur "Suivant : Vérifier + créer"
- Cliquer sur "Créer"
 
  Le déploiement de la passerelle va commencer, cela peut prendre un certain temps. Nous accéderons à la ressource une fois le déploiement terminé.

# Etape 12 : Configurer un WAF

L'intégration d'un Web Application Firewall (WAF) nous offre une couche de sécurité supplémentaire en ajoutant des protections pour les serveurs web.

- Afficher votre groupe de ressource
- Sélectionner la ressource "TP-AZURE-WAF"

Par défaut, un WAF est en mode "Prévention", pour notre TP, nous allons interdire la "France" de se connecter à notre site web. Pour cela, nous allons passer le WAF en mode "Prévention"

- Cliquer sur "Basculer en mode prévention"

![WAF 1](https://acenox.fr/memoire/waf1.png)

- Cliquer sur "Règle personalisés"
- Cliquer sur "Ajouter une règle personnalisé"
- Nom : tpazurefranceprotection
- Activer la règle : check
- Type de règle : correspondance
- Priorité : 1
- Si : Type de correspondance Géolocalisation
- Variable : RemoteAddr
- Opération : Est
- Pays : France
- Alors : Refuser le trafic
- Cliquer sur "Ajouter"
- Cliquer sur "Enregistrer"

![WAF 2](https://acenox.fr/memoire/waf2.png)

# Etape 13 : Accéder à notre URL possédant un parefeu

- Afficher votre groupe de ressource
- Sélectionner "tpazureag"
- Vous trouverez votre adresse IP publique
- Ouvrez une page google avec votre IP (ici : https://20.19.152.54) ; si vous avez bien suivi le TP, vous devriez avoir l'erreur : "403 Forbidden" vous indiquant que vous n'avez pas accès.

![403](https://acenox.fr/memoire/403.png)

Pour s'assurer que cela fonctionne bien, vous pouvez désormais tenter de désactiver le WAF en retournant sur la configuration et en cliquant sur "Désactiver" si vous retournez sur votre IP publique, vous devriez avoir le site d'affiché.

![Waf 3](https://acenox.fr/memoire/waf3.png)

Une fois désactivé, en rafraichissant la page, le site est bien accessible.

![TP AZURE](https://acenox.fr/memoire/tp-azure.png)

# Étape 14 : Fin du TP - Suppression des ressources

Nous vous conseillons fortement de supprimer vos ressources car comme vu pendant le cours, le paiement se fait à l'utilisation. Vu que nous avons terminé le TP, vous pouvez supprimer.
Pour cela, rien de plus simple il suffit de suivre les étapes suivantes : 

- Rechercher "Groupe de ressources"
- Sélectionner votre Groupe "TP_Azure"
- Cliquer sur "Supprimer le groupe de ressources"

![Fin deploiement](https://acenox.fr/memoire/supv2.png)
