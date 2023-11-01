Steps to setup the project: Clone the project: git clone https://github.com/DJAgarwal/bookstore-api.git

1. composer install
2. rename the env.example file to .env
3. command php artisan migrate
4. command php artisan db:seed. //This step will generate admin and customer users and 100 books data.
5. Three users are created(1 admin, 2 customers)
Creds:
email:admin@admin.com
password:admin@123

email:customer1@gmail.com
password:customer@123

email:customer2@gmail.com
password:customer@123
6. php artisan serve
7. Project will run on 127.0.0.1:8000

Let me know if you face any issues: dheerajagarwal1995@gmail.com