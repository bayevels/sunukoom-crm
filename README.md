# sunukoom-crm
## Docs

## I.	Prérequis 
Pour fonctionner correctement, Laravel a besoin de PHP :
* Version >= 7.2.0,
*	Extension PDO,
*  Extension Mbstring,
*  Extension OpenSSL,
*  Extension Tokenizer,
*  Extension XML.,
*  Extension BCMath,
*  Extension Ctype,
*  Extension JSON
Autres prérequis : 
*  Composer
*  Git
*  Vs Code

## II.	Dev
Voici les étapes à suivre en mode développement :
*  Clonage du projet  git clone https://github.com/bayevels/sunukoom-crm.git
*  Installation des packages du projet cloné composer install
*  Renommage du fichier env.dev contenu dans le répertoire racine en un fichier .env
*  Configuration de la base de données à partir du fichier .env (par défaut sqlite3 est utilisé comme serveur de base de données)
*  Démarrage du serveur de l’application de notre CRM  php artisan serve
*  Connection sur l’application  login : abada@gmail.com  password : 123
## III.	Prod
Pour cette partie, il faut installer NGINX 
*  Se positionner sur le répertoire conf du serveur NGINX
*  Ouvrir le fichier nginx.conf et ajouter ce bout de code donné ci-dessous

<p> server { <p>
<pre><code>   
listen 80; 
server_name www.sunukoom.com;
root /example.com/public;	
   	   
add_header X-Frame-Options "SAMEORIGIN";
add_header X-XSS-Protection "1; mode=block";
add_header X-Content-Type-Options "nosniff";
	
index index.html index.htm index.php;
   	
charset utf-8;
   	
location / {
   try_files $uri $uri/ /index.php?$query_string;
   }
   	
location = /favicon.ico { access_log off; log_not_found off; }
location = /robots.txt  { access_log off; log_not_found off; }
   	
error_page 404 /index.php;
   	
location ~ \.php$ {
fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
fastcgi_index index.php;
fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
   	        include fastcgi_params;
   }
   	
   	    location ~ /\.(?!well-known).* {
   	        deny all;
   	    }
   	}

<code><pre>
# Présentation de l'application

## Page d'accueil de notre CRM
![alt text](https://github.com/bayevels/SunuKoom-Mobile/blob/master/docs/images/11.png)
## Liste des employés enregistrés
![alt text](https://github.com/bayevels/SunuKoom-Mobile/blob/master/docs/images/1.png)
## Liste des fournisseurs enregistrés
![alt text](https://github.com/bayevels/SunuKoom-Mobile/blob/master/docs/images/2.png)
## Visionnage des employés de notre application
![alt text](https://github.com/bayevels/SunuKoom-Mobile/blob/master/docs/images/3.png)
## Page de modification d'un employé
![alt text](https://github.com/bayevels/SunuKoom-Mobile/blob/master/docs/images/4.png)
## Page de gestion des rôles de notre application
![alt text](https://github.com/bayevels/SunuKoom-Mobile/blob/master/docs/images/5.png)
