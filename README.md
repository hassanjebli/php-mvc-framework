# PHP MVC Framework

A lightweight, efficient PHP MVC (Model-View-Controller) framework built from the ground up. This framework provides a robust structure for managing web application routing, database interactions, and templating, offering a balance between simplicity and power.

## Key Features

- Streamlined routing system
- MVC architecture implementation
- Database interaction via PDO
- Integrated session management
- Flash message functionality
- Extensible middleware support

## Getting Started

### Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP 7.4 or higher
- Composer
- A web server (e.g., Apache, Nginx, etc.)
- A database (e.g., MySQL, MariaDB, etc.)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/hassanjebli/php-mvc-framework.git
cd php-mvc-framework
 ```

2. Install the dependencies:

```bash
 composer install
```

3. Set up your environment variables. Create a .env file in the root directory and add your database credentials:

```bash
DB_DSN=mysql:host=localhost;dbname=your_db_name
DB_USER=your_db_user
DB_PASS=your_db_password
```

4. Configure your web server to point to the public directory as the document root.

```bash
cd public
```

5. Run the database migrations to create the necessary tables:

```bash
php migrations.php
```

6. Start the application:

```bash
php -S localhost:8080
```

### Directory Structure

```plaintext
.
├── controllers
│   ├── AuthController.php
│   ├── SiteController.php
├── core
│   ├── db
│   │   ├── Database.php
│   │   └── DbModel.php
│   ├── form
│   │   ├── BaseField.php
│   │   └── Form.php
│   │   └── InputField.php
│   │   └── TextareaField.php
│   ├── middlewares
│   │   ├── AuthMiddleware.php
│   │   └── BaseMiddleware.php
│   ├── exception
│   │   ├── ForbiddenException.php
│   │   └── NotFoundException.php
│   ├── Application.php
│   ├── Controller.php
│   ├── Middleware.php
│   ├── Model.php
│   ├── Request.php
│   ├── Response.php
│   ├── Router.php
│   ├── Session.php
│   └── View.php
├── vendor
├── models
│   ├── LoginForm.php
│   ├── UserModel.php
├── public
│   ├── index.php
│   └── assets
├── views
│   ├── layouts
│   │   └── main.php
│   ├── _error.php
│   ├── home.php
│   ├── login.php
│   ├── profile.php
│   └── register.php
├── .env
├── composer.json
├── migrations.php
└── README.md 
