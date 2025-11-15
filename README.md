# laravel-blog-app
Blog App

# 1. Clone the Repository:

git clone https://github.com/athulrajpb007/laravel-blog-app.git
cd laravel-blog-app

# 2. Install Dependencies

composer install
npm install
npm run build
npm run dev

# 3.Create .env file:

cp .env.example .env

Update DB credentials:

DB_DATABASE=blog_app
DB_USERNAME=root
DB_PASSWORD=

# 4. Generate Key

php artisan key:generate

# 5. Run migrations:

php artisan migrate

# 6. Start the Development Server

php artisan serve
