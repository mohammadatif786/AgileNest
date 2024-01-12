AgileNest Documentation
AgileNest is a task/project management application built with Laravel, Laravel Breeze, Spatie Laravel Permission, Bootstrap for styling, and JavaScript for dynamic interactions.

Table of Contents
Introduction
Installation
Install Laravel
Install Laravel Breeze
Set Up Database and Environment
Install Spatie Laravel Permission
Create Middleware for Role and Permission
Register Middleware in Kernel
Usage
Authentication
Roles and Permissions
Customization
Frontend
Roles and Permissions
Troubleshooting
Contributing
License
1. Introduction
AgileNest is a task/project management application designed to provide a clean and efficient user experience. It leverages Laravel Breeze for authentication, Spatie Laravel Permission for role and permission management, and Bootstrap for styling.

2. Installation
2.1 Install Laravel

composer create-project laravel/laravel AgileNest
cd AgileNest
2.2 Install Laravel Breeze

composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
2.3 Set Up Database and Environment
Configure your database connection in the .env file and run migrations.

php artisan migrate
2.4 Install Spatie Laravel Permission

composer require spatie/laravel-permission
php artisan migrate
2.5 Create Middleware for Role and Permission
Generate middleware to handle role and permission checks.

php artisan make:middleware CheckRole
php artisan make:middleware CheckPermission
Edit these middleware classes according to your needs.

2.6 Register Middleware in Kernel
Register the middleware in app/Http/Kernel.php.

protected $routeMiddleware = [
    // ... other middleware
    'role' => \App\Http\Middleware\CheckRole::class,
    'permission' => \App\Http\Middleware\CheckPermission::class,
];
3. Usage
3.1 Authentication
AgileNest uses Laravel Breeze for authentication. Utilize the login and registration features provided by Breeze.

3.2 Roles and Permissions
Utilize Spatie Laravel Permission for managing roles and permissions. Middleware (CheckRole and CheckPermission) has been provided to integrate role and permission checks into routes and controllers.

4. Customization
4.1 Frontend
Customize the frontend by modifying views and assets in the resources/views and resources/assets directories.

4.2 Roles and Permissions
Customize roles and permissions by adjusting the middleware, database tables, and related functionality provided by Spatie Laravel Permission.

5. Troubleshooting
If encountering authentication issues, verify the Laravel Breeze and Sanctum configurations.
For roles and permissions, ensure middleware and database tables are set up correctly.
