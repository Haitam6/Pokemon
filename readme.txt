                        READ ME 

Pour lancé l'application pokémon il faut avoir un serveur web installé, vous pouvez retrouver plusieurs tutoriel pour l'instalation sur internet.
Ne pas oublier de mettre le mot de passe et l'utilisateur que l'on utilise dans phpmyadmin dans le fichier connexpdo.inc.php.
Il faudra aussi se donner les droits en faisant chmod 777 au cas où vous ne les auriez pas pour faire les modifications.



                      Difficulté
J'ai rencontré plusieurs difficulté durant mon projet, tout d'abord l'affichage des erreurs avec le fichier vueErreur.php qui ne fonctionne pas correctement. 
Le modèle MVC m'a aussi perturbé au début car je ne savais pas où je devais placer chaque fichier. 
Faire le tableau du fichier test.php fut aussi difficile notamment avec la requete SQL. J'ai aussi eu du mal a faire le fichier index.php. Suite a l'étape 
2 j'ai rencontré des difficultés pour afficher les modifications dans le tableau du fichier historiser.php


Désormais je vais essayer d'expliquer quelques dossier de mon projet.
- Le dossier Modèle :
    Contient le fichier pokemon.php qui possède la classe pokemon et le fichier type.php qui possede la classe type.
    Ce dossier doit posseder toutes les données de l'application.
    Il contient aussi le fichier connexpdo.inc.php necessaire a la connexion a la base de données.
    Et aussi le fichier model.php qui contient les fonctions qui m'ont permis de réaliser l'étape 2.


- Le dossier Public : 
    Contient tous les fichiers de style tel que le css ou la photo en png. Ainsi que les fichiers xml et dtd.



- Le dossier Vues :
    Ce dossier contient tous les fichiers necessaires a l'affichage de l'application. Le fichier home.php est la page d'accueil de l'application, le fichier test.php est le fichier qui permet d'afficher un tableau et c'est aussi le fichier qui fait le lien avec la base de données, il permet donc d'extraire les données des pokémons et les afficher.
    Le fichier template.php est le fichier contenant les éléments qu'on utilisera dans tous les autres fichier du dossier vues, notamment le code html. Le fichier vueErreur.php contient le code pour afficher les erreurs. L'étape 2 a vu l'apparition de 2 nouveau fichier historiser.php et modifier.php, 
    ce dernier permet d'afficher en le menu déroualant des noms de pokemons par ordre alphabétique ainsi que des labels pour la taille et le poids, le bouton envoyer permet d'envoyer les modications dans la page historisation qui elle est codée dans le fichier historiser.php. Dans ce fichier on retrouve le code afin de crée le tableau où l'on affichera les modifications. 
    Ces modifications se charge dans le fichier xml histo.xml a chaque fois que l'on fait une modification.
    

- Le dossier controleur :
    Ce dossier possède un seul fichier controller.php qui contient des fonctions de chaque fenetres de l'application pokemon. Le controleur appelle les vues et Index appelle la barre fonction du controlleur.

