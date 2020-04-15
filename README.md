# Projet Laravel de Rémi Moncorgé


## Installation 
#### 1/ Cloner le repository 

git clone https://github.com/remimoncorge/Laravel.git

#### 2/  Changer les valeurs des fichiers .env.sample .env
 Changer les valeurs suivantes  selon votre environnement et vos données personnelles :

- `APP_URL`
- `GOOGLE_CLIENT_ID`
- `GOOGLE_CLIENT_SECRET`
- `GOOGLE_REDIRECT_URL`
- `GITHUB_CLIENT_ID`
- `GITHUB_CLIENT_SECRET`
- `GITHUB_REDIRECT_URL`

#### 3) A faire si ce n'est pas déjà présent
- ```composer install```
- ```chmod -R 777 storage```
- ```php artisan migrate:fresh --seed && php artisan voyager:install```
- ```php artisan storage:link```
- ```npm install```
- ```npm run production```

#### 4) Lancement
php artisan serve dans le terminal

URL : http://127.0.0.1:8000/

#### 5) Login utiles
en tant qu'utilisateur : user@user.com / user

pour la partie administrateur : aller sur http://127.0.0.1:8000/admin

connexion : admin@admin.com / admin

## Compte rendu
#### Tâches réalisées
* [x] **Pages** Accueil / Articles / Un article et commentaires / Register / Login / Contact

Pages d'accueil présentant les articles dans l'odre
Pages articles présentant tous les articles, le plus récent en haut
Page spécifique pour un article présentant l'article et ses commentaires
Page Register qui permet de s'inscrire
Page Login pour s'identifier
Page Contact pour envoyer un message


* [x] **Newsletters**

Footer présent sur chaque page pour s'inscrire à la newsletter
* [x] **Commentaires**

Fonction uniquement possible pour les membres déjà conneté, possibilité de modifier / supprimer son commentaire sur la page de l'article.
* [x] **CRUD** 

Depuis son espace personnel (user profile), une fois connecté, l'utilisateur peut éditer, ajouter ou supprimer un de ses posts.
* [x] **Voyager** 


Implémentation de Voyager pour la partie administrateur, possibilité de visualiser/éditer/supprimer tous les articles, commentaires, contact, inscription newsletter, medias ... Disctinction du rôle d'administrateur et de user.Possiblités de rajouter de nouveaux rôles.  

* [x] **Médias**

Gestion des médias présent sur le blog. Possibilité de mettre une photo lors de l'édition d'aricle
* [x] **Identification Auth / Socialite**

Possibilité de se connecter avec Google ou Github 
* [x] **Utilisation Seeds & Factory** 

Utilisation pour Users / Post / Contact / Comment / Newsletters /
(MenuItem / DataTypes / DataRows / Settings)
* [x]  **Sass** **Laravel Mix**

Intégration graphique responsive
* [x]  **Utilisation Framework VueJS**


#### Tâche non réalisées ... 
* [ ] 9 - Tests unitaires
* [ ] 10 - Une application de gestion de fichiers avec catégorisation, VueJS, multi-upload,authentification
* [ ] 11 - Un Webchat avec Pusher et Vue.js
* [ ] 12 - Surprise!

## Utilisation de git

N'étant pas en binôme, je n'ai pas pris le temps d'utiliser Git tout au long de mon projet. J'ai donc créé ce repository et effectuer un commit de quelques modification mineures afin de montrer mes compétences avec cet outil.



