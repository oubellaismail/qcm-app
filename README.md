# QCM-APP

The QCM App is a powerful Laravel-based application designed specifically for educational institutions. It features robust capabilities for managing users, departments, fields, quizzes, and grades, and is equipped to handle varied roles such as administrators, professors, and students.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Environment Setup](#environment-setup)
- [Usage](#usage)
- [Additional Information](#additional-information)

## Installation

To set up your local development environment, perform the following steps:

Clone the repository

```
git clone https://github.com/oubellaismail/qcm-app.git
```

Navigate to the project directory

```
cd qcm-app
```

Install Composer dependencies

```
composer install
```

If any issues arise, run the update command 

```
composer update
```

Set up your environment file

```
cp .env.example .env
```

 Generate a new application key

```
php artisan key:generate
```

Run the database migrations (make sure your database is configured in .env)

```
php artisan migrate
```

Populate the roles table with predefined roles then create an admin user
(Execute this SQL query in your database management tool or via command line, **admin password is 'admin@gmail.com'**)

```
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'Professor', NULL, NULL),
(3, 'Student', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$vUDUrpK.YxsswI3m6EB8BeGANRID4FPd8GKM/prOJvc1pLOioCHXy', NULL, '2024-01-06 08:15:07', '2024-01-06 08:15:07', 1);
```

Start the local development server

```
php artisan serve
```

 You can now access the server at http://localhost:8000

## Configuration

### Basic Configuration

After installation, you can begin configuration by updating the environment variables in the `.env` file. These include:

- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` for database configuration.
- `APP_ENV`, `APP_DEBUG`, and `APP_URL` to set the application environment, debug mode, and URL respectively.

### Admin Configuration

As the project uses a single admin account, it is important to manually set up the first admin user record by the SQL query provided in the installation section to create the admin user record in the database or create a seed for the initial user.

## Environment Setup

Prerequisites you will need:

- PHP 
- MySQL 
- Composer

Ensure your PHP installation includes the required extensions. More details can be found in the Laravel documentation.

## Usage

### Admin Panel

To manage users, departments, and fields:

1. Log in as the admin user.
2. Navigate to the admin panel via the dashboard.
3. Perform user, department, and field management operations.

### Professor's Interface

Professors can manage quizzes and view student data via their respective dashboards.

### Student's Interface

Students can access and take quizzes that are assigned to them.

Each role's functionalities and interfaces are secured and can only be accessed by authenticated users with the correct privileges.

## Additional Information

For a complete guide on Laravel deployment and environment specifics, please refer to the [official Laravel documentation](https://laravel.com/docs).

Feel free to reach out with questions or contributions to the project.

---