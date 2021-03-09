                                      PROJET 5  - VOTRE 1er BLOG en PHP

Son architecture est basée sur le modèle MVC  approche orientée objet!
Le projet respect les normes PSR1, PSR2, PSR4, PSR7 selon la consigne pour la soutenance.
Le framework s'inspire des lecons de GRAFIKART apprendre le PHP  et la manipulation des données sont aussi inspirées
des videos de grafikart
Template bootstrap  :  https://startbootstrap.com/theme/clean-blog

Il utilise les librairies intégrées grâce à Composer et telechargeables sur le lien : https://packagist.org/
- "fzaninotto/faker" version "1.9" qui est uploadée par le terminal en rentrant : php commands/fill.php,
- "whoops" version "2.7.3"
- autoload :  lassmap" : Altorouter.php "version "v1.2.0"
- "npm": "6.14.10" ( url: 127.0.0.1:1080 ) -> Ouverture MailDev
- Papercut stmp version 5.7.0

Pour les actions sur Gitbash, certains "alias" crées :
alias :
- agent ='eval ssh-agent && ssh-add ~/.ssh/id_rsa'
- galias ='git config --list ! findstr "alias"'
- mail='maildev --ip 127.0.0.1'
- www='cd C:/wamp6/www'


INSTALLATIONS:

Développé avec : PHP         Version  7.4.9
                 PHP MyAdmin Version  5.0.2
                 PHP MySQL   Version  5.7.31
                 Composer
                 Html 5 & CSS3
                 Java Script
                 Bootstrap

 Il faudra télecharger  le dossier projet :
 --git clone   https://github.com/pascalinecte91/projet_5_blog.git

 VISUALISATION DU PROJET : Dans le terminal : C:\wamp64\www\projet5>  php -S localhost:8000 -t public

CONNEXION UTILISATEURS : ' fonctionnement':
Le membre pourra se connecter via : l'onglet de navigation situé en haut à droite de chaque page.
L'administrateur quant à lui se connectera  avec le lien (selon consigne projet) dans le "footer".
Le futur membre pourra s'inscrire via l'onglet : INSCRIPTION.
Il devra rentrer un PSEUDO et un mot de passe.

CONNEXION ADMINISTRATEUR :  Username : admin
                            Password: 9999

PAGES PRINCIPALES (4) : ' leurs roles'

- ACCUEIL -> Cette page permet de remplir un formulaire selon le souhait du visiteur pour me contacter en indiquant son nom, email, n° tel,
 ainsi qu'un message. Un lien  pour ouvrir mon CV se trouve au centre du  "header" de chaque page.
 Qu'est ce que PAPERCUT smtp? Une visionneuse rapide d'emails avec un serveur SMTP intégré conçu pour recevoir uniqueent des messages.

 Les données du formulaire de la page d'accueil sont recupérées avec PAPERCUT stmp, le formulaire foncionne en "local".
 Le fichier contact.php  dans le sous dossier home du fichier controller permet de recuperer plusieurs informations.

- BLOG -> liste de tous les "posts" comportant : titre, slug, auteur et date.
- MEMBRES -> permet la Connexion en tant que "membres déjà inscrits".
- INSCRIPTION  -> comme son nom l'indique, au choix du visiteur!



Sur le BLOG les membres peuvent:
- Poster un "article"
- Ecrire un "commentaire"
- Envoyer un email ( page accueil )
- Consulter la liste des articles et ouvrir l'article de leurs choix afin de laisser ou non un commentaire (si validation).

Sur le BLOG , le rôle ADMIN :
"POSTS"
- Creer un article
- le Supprimer
- le modifier

"COMMENTS"
- creer un commentaire
- le supprimer
- le modifier
- le valider

Pour chaque action, un message d'alerte apparait en suivant le principe suivant:
- Alert success = " modifications/ edit "
- Alert danger = " suppressions/ delete "
- Alert warning = " création/ create "
- Alerte info = " information ".
- onsubmit Alert = pour les alertes à caractère de validation ( commentaire à valider, mail à retourner)

AUTEUR : Pascale CHRISTOPHE élève stagiaire chez OpenClassRooms " formation Développeur Application/ PHP / SYMFONY
