#Laravel Template

Quick boilerplate template of Laravel setup with Docker and Deployer, with some helpful tasks.

##Getting started
Once the project is cloned you need to do a few things:
- Composer install
    - `composer install`
- Setup your .env file
    - `cp .env.example .env`
    - Change the `HTTP_PORT`, `MYSQL_PORT` and `APP_URL` in `.env`
- Generate your application key
    - `./vendor/bin/dep artisan:key:generate`
- Deploy
    - `./vendor/bin/dep deploy`
    
After running these commands you should be able to view your application in a browser by navigating to whatever you set your `APP_URL` to in `.env`