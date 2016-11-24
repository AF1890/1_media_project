discographie
============

A Symfony project created on November 10, 2016, 8:17 am.

Installation du projet

1 - git clone https://github.com/wcsfontainebleau/JULIEN.git

2 - composer install

3 - App/Config/Parameter.yml

        - database_name: discographie
        
4 - php app/console doctrine:database:create

5 - php app/console doctrine:schema:update --force

6 - php app/console assets:install

7 - php app/console cache:clear --all ou --env=prod


