#How to run the project

#Clone or download the proyect as a zip file
#In you terminal use composer install in you proyect folder
#With xampp open, create a database call blog (you could modify the file .env to use the database of your preference) I use phpMyAdmin
#Then use php artisan migrate:refresh --seed
#And then php artisan serve

#The Database seeder and the factory create some registers on all the tables except likes. The password for all the users is "secret".
