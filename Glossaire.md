# Glossaire

## Introduction
--
Quelles sont les éléments d'une requête php au serveur ?
http:// -> protocole employé pour la communication
monsite.com/ -> nom de domaine du serveur sur web
liste.php -> la ressource demandée
?page=2 -> le param de requête "page" avec pour valeur = 2

--
Qu'est ce qu'un paramètre de requête ?
-> apporte au serveur une info supplémentaire sur la façon de lire la ressource

--
Quelle est le nom techique du paramètre de requête ?
-> Query string parameter

## Superglobales PHP

--
Pour quelles raisons php a-t-il des superglobales ?
-> accéder à toutes les infos pouvant être transmis par un client au serveur

-- 
De quelle type sont les variables superglobales ? Pourquoi?
-> Tableau, manière de regrouper plusieurs infos sous forme key=>value

--
Que contient la superglobale $_GET ?
-> paramètres transmis au serveur par URL de la requête = Query String Parameter
--
Que contient la superglobale $_POST ?
-> paramètres transmis au serveur par formulaire = Form Data
--
Que contient la superglobale $_COOKIE ?
-> données stockées dans les cookies du navigateur client
--
Que contient la superglobale $_REQUEST ?
-> données transmises par les trois superglobales $_GET, $_POST et $_COOKIE
--
Que contient la superglobale $_SESSION ?
-> données stockées dans la session utilisateur côté serveur (si cette session a été démarrée au préalable)
--
Que contient la superglobale $_FILES ?
-> informations associées à des fichiers uploadés par le client.

--
Quelles sont les deux utilités de la focntion session_start()?
-> démarrer session sur le serveur pour utilisateur courant ou récupérer la session de ce même utilisateur s'il en avait déjà une

--
Qu'est ce qui permet à session_start() de récupérer la session d'un utilisateur ?
-> Le serveur enregistre un cooki PHPSESSID dans le navigateur client au démarrage d'une session, contenant l'identifiant de sa session.

--
Quand est-ce que les cookies sont transmis au serveur ?
-> A chaque requête HTTP effectuée par l'utilisateur

--
Que fait la fonction header ?
-> (Pas super compris) envoie un nouvel entête HTTP au client

-- 
A quoi sert la fonction header("Location:..."), quel numéro va être envoyé ?
-> A rediriger le client vers la ressource précisé dans la fonction
status code 302

--
Pourquoi vérifier les données transmises au serveur par l'envoie d'un formulaire ?
-> 1: Provoquer des erreurs et 2: Piratage du serveur par injection de code

--
Nommer deux types de failles par injection de code
-> XSS (Cross site scripting) ou SQL injection (écrire du SQL dans un champ afin de faire exécuter cela par la BDD)