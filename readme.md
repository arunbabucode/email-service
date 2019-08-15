## Usage

1. Clone the repo
2. cd into the repo
3. run `composer install`
4. Create a `.env` file from `.env.example`
5. Set `REDIS_HOST` to `redis_email`
6. Set `CACHE_DRIVER` to `redis`
7. Run `php artisan key:generte`
8. Run `docker-compose up -d`
10. Run test by `vendor/bin/phpunit`

## Usage
1. `http://localhost:44680/api/send-email` accepts `POST` with data `{"user_id": 1}`