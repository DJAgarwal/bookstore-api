Steps to setup the project:
composer install
rename the env.example file to .env
command php artisan migrate
command php artisan db:seed
This will create three users(1 admin, 2 customers)
Creds:
email:admin@admin.com
password:admin@123

email:customer1@gmail.com
password:customer@123

email:customer2@gmail.com
password:customer@123