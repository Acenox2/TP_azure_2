# TP Azure - Mémoire 5ème année

# Etape 1 : 

- Posséder un compte Azure https://portal.azure.com
- Posséder un compte Github https://github.com/

# Etape 2 : 

- Créer un abonnement. Lorsque vous êtes étudiant, vous pouvez bénéficier de l’offre gratuite disponible ici : https://portal.azure.com/#view/Microsoft_Azure_Education/EducationMenuBlade/~/overview

![Groupe de ressource](https://acenox.fr/memoire/Groupe%20de%20ressource.png)

# Etape 3 : Créer l'application Web

- Se rendre dans "App services" : https://portal.azure.com/#view/HubsExtension/BrowseResource/resourceType/Microsoft.Web%2Fsites
- Cliquer sur "Créer" une nouvelle application web
- Nom : tp<prénom><numéro> ***/!\ L'objectif est que le nom soit unique /!\***
- Publier : Code
- Pile d'éxécution : PHP 8.2
- Système d'exploitation : Linux
- Région : France Central

![Application Web](https://acenox.fr/memoire/Application_web.png)

# Etape 4 : Fork le projet

- Rendez-vous ici : https://github.com/JorisPV/TP_azure
- Cliquer sur le symbole "Fork" se trouvant en haut à droite

![Fork](https://acenox.fr/memoire/fork.png)

- Récupérer le lien de votre projet Github cela devrait être : https://github.com/<pseudo>/TP_Azure

# Etape 5 : Relier Github x Azure

- Rendez-vous dans la catégorie "Déploiement"
- Activer "Github Actions"
- Compte : Connecter votre compte Github
- Organisation : Sélectionner votre compte github
- Dépôt : Sélectionner TP_Azure
- Branche : Main

![Deploiement](https://acenox.fr/memoire/Deploiement.png)

# Etape 6 : Vérifier et créer

- Cliquer sur "Vérifier et créer"
- Puis cliquer sur "Créer"
- Attendre que le déploiement se termine

![Verifier et creer](https://acenox.fr/memoire/Deploiement_v2.png)

Une fois terminé, vous pouvez accéder à votre ressource

![Acceder a la ressource](https://acenox.fr/memoire/fin.png)

# Etape 7 : Attendre le déploiement de l'application

Maintenant que votre ressource est crée, l'application sera déployée par rapport à votre github.

![Attente fin deploiement](https://acenox.fr/memoire/att_fin_deploiement.png)

# Etape 8 : Accéder à la ressource

Une fois le déploiement terminé, vous pourrrez accéder à votre site : https://tp<prénom><numéro>.azurewebsites.net

![Fin deploiement](https://acenox.fr/memoire/Deploiement_ok.png)

Félicitations le site est déployé 🎉​ Vous pouvez désormais effectuer des modifications sur votre réportoire Github et les modifications seront automatiquement déployés sur votre site internet Azure.

# Etape 9 : Fin du TP - Suppression des ressources

Nous vous conseillons fortement de supprimer vos ressources car comme vu pendant le cours, le paiement se fait à l'utilisation. Vu que nous avons terminé le TP, vous pouvez supprimer.
Pour cela, rien de plus simple il suffit de suivre les étapes suivantes : 

- Rechercher "Groupe de ressources"
- Sélectionner votre Groupe "TP_Azure"
- Cliquer sur "Supprimer le groupe de ressources"

![Fin deploiement](https://acenox.fr/memoire/sup.png)
