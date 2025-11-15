# laravel-blog-app
Blog Application

# Laravel Blog Application

This is a simple Laravel application built as part of an evaluation assignment.

## 📌 Features
- User Authentication (Register & Login)
- Create, View, Edit, and Delete blog posts
- Only post owners can edit/delete their posts
- Form validation (title: required, min 3 chars; content: required)
- Dashboard showing all posts
- Blade templates for UI
- Eloquent User–Post relationship
- API endpoint to fetch all posts in JSON format

## 1. Clone the Repository:

git clone https://github.com/athulrajpb007/laravel-blog-app.git
cd laravel-blog-app

## 2. Install Dependencies

composer install
npm install
npm run build
npm run dev

## 3.Create .env file:

cp .env.example .env

Update DB credentials:

DB_DATABASE=blog_app
DB_USERNAME=root
DB_PASSWORD=

## 4. Generate Key

php artisan key:generate

## 5. Run migrations:

php artisan migrate

## 6. Start the Development Server

php artisan serve

## 7. API Endpoint

[GET /api/posts](http://127.0.0.1:8000/api/posts)


