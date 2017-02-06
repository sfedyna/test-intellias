Test task for  Intellias
=======

This document contains information on how to download, install, and start
using this project.

 1) Installing project
----------------------------------

### 1.1) git pull from github //console command

### 1.2) Adjust the folder permissions:

    web\uploads - 777
    var\cache - 777
    var\logs - 777

### 1.3) create a database  //mysql

### 1.4) php composer.phar install   //console command

### 1.5) configure app/config/parameters.yml

### 1.6) Create / Update the database
    php bin/console doctrine:schema:update --force  //console command

### 1.7) install assets
    php bin/console assets:install web  //console command

