#How to run the project

#Clone or download the proyect as a zip file
#Add a .env file following the structure of .env_example
#In you terminal go to the project folder and use composer install 
#With xampp open, create a database name as blog (you could modify the file .env to use the database of your preference) I use phpMyAdmin
#Then use php artisan migrate:refresh --seed
#And then php artisan serve

#The Database seeder and the factory create some registers on all the tables except likes. The password for all the users is "secret", and the admin user is admin@admin.com.

