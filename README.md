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

composer install
composer require laravel/horizon
composer install --ignore-platform-req=ext-pcntl --ignore-platform-req=ext-posix
composer require laravel/horizon --ignore-platform-req=ext-pcntl --ignore-platform-req=ext-posix