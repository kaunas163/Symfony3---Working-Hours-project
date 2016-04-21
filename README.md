Working Hours
=============

This web applications purpose is to track how much time you spent on a project. This can help to count how much money you need to take from your client, or if you're working in team by agile method you can also track hours, because it's needed, or for any other reason.

Installation
------------

Run these commands to install application:

```
git clone https://github.com/kaunas163/Symfony3---Working-Hours-project.git
cd Symfony3---Working-Hours-project
composer install
```

Check connection to database settings under ``` app\config\parameters.yml ```

Then run some more commands which will create database and all needed tables:

```
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
```

If first doctrine command doesn't work and it says that database exists (maybe you created by yourself, or you haven't changed parametrers.yml file), so do only second command, or change to which database to execute sql scripts.

To run application use command:
```
php bin/console server:run
```


Progress
--------


What is done:
 * Created database tables and doctrine entities.
 * Created all needed controllers and views for CRUD on these types of data: categories, projects, works.
 * Attached bootstrap.

Todo:
 * Count total times
 * Make user registration and login.
 * Restrict pages access so user can access only his data.
 * Move stuff from app/ to WorkingHoursBundle so my code could be implemented in other projects easier.
 * Do funcionality on categories, projects and works archivings, so user can hide what he doesn't need anymore.
 * Tables sortings acs/desc and data filtering/searching
 * Paging of everything
