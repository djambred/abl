## STEP
1. docker compose up -d --build
2. docker exec -it abl bash
3. composer install
4. edit .env
5. php artisan make:model Client -m
6. php artisan make:model Product -m
7. php artisan make:controller Api/ProductApiController
8. php artisan make:middleware ClientAuth