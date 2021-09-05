# Manage soccer team and its players.
Api powered CRUD based application using <a href="https://laravel.com" target="_blank">Laravel</a> and Bootstrap Auth. 

## Introduction
It's a laravel web application with using laravel api end points for managing soccer teams and their respective players. Proper authentication for admin API routes for Create,Update,Delete on teams/players endpoints. Guest users are using Read endpoints. 

## System requirements
These are the server requirements needed to setup the application on different machines:

- PHP >= 7.3
- Mysql >= 5.7

## Installation
Follow below steps to be able to run the application

1. git clone https://github.com/deepak4738/Soccer-App.git
2. cd soccer-app && cp .env.example .env and update with needfuls. Also add unique key value to SOCCER_TOKEN key at bottom of .env.
3. composer install && composer update
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
7. serve the application

## To Run the application on localhost
#### Application will serve on the available PORT like `http://localhost:8000`

```
php artisan serve
```
Default admin-login credentials is:
```
email - admin@devon.com
password - admin@2021
```

## Screenshots:

##### Team Listing
![screenshot](https://github.com/deepak4738/Soccer-App/blob/master/screens/team_list_home.png)

##### Team Players
![screenshot](https://github.com/deepak4738/Soccer-App/blob/master/screens/players_list_home.png)

##### Admin Team CRUD
![screenshot](https://github.com/deepak4738/Soccer-App/blob/master/screens/team_list_admin.png)

##### Admin Player CRUD
![screenshot](https://github.com/deepak4738/Soccer-App/blob/master/screens/player_list_admin.png)
