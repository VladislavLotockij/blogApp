composer install
cp .env.example .env
php artisan key:generate
sail up -d
sail artisan migrate
