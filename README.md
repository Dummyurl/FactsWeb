# FactsWeb
PHP and React 


Getting Started
Clone the project repository by running the command below if you use SSH

git clone git@github.com:naxadeve/FactsWeb.git
If you use https, use this instead

git clone https://github.com/naxadeve/FactsWeb.git
After cloning, run:

composer install

php artisan preset react 

then 

npm install
Duplicate .env.example and rename it .env

Then run:

php artisan key:generate
Prerequisites
Be sure to fill in your database details in your .env file before running the migrations:

php artisan migrate
And finally, start the application:

php artisan serve
and visit http://localhost:8000 to see the application in action.

Built With
Laravel - The PHP Framework For Web Artisans
React - A JavaScript library for building user interfaces
