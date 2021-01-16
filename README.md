Follow the steps below to test the application

1. Download or Clone the backend and frond end from git hub link - https://github.com/Nzambu/medbook-dev-app

2. navigate to medbook-dev-app and run the following commands

NB: Assuming use of local mysql, create database health_record and edit .env file username and password to those used in localhost mysql

    1. Composer update
    2. php artisan migrate
    3. php artisan db:seed
    4. php artisan serve --host localhost --port 8000

3. navigate to medbook-dev-app-vue and run the following commands
    1. yarn update
    2. yarn serve - wait for the command execution to completion

4. visit on the browser localhost:8080/login

    user email : patrick@authentication.com
    password : P@%%w0rd

5. Documentation of the apis can be viewed at localhost:8000/docs/

NB : Assumes already using/running local mysql