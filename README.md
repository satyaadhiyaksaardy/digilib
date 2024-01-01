# Digital Library Based on Laravel

This project is a web-based Digital Library Content Management System (CMS) developed with Laravel 10. It is designed to manage digital library content, including books and their categories, with robust features for user authentication, data management, and access control.

## Features

- **Authentication:**
  - Login system for Admin and User roles.
  - User registration functionality.

- **Book Management:**
  - Comprehensive listing of books with filters by category.
  - Full CRUD capabilities for book records, including file uploads for PDFs and book cover images.

- **Category Management:**
  - Listing of book categories.
  - CRUD operations for managing book categories.

- **Data Export:**
  - Functionality to export book data to CSV, Excel and PDF formats.

- **Access Control:**
  - Role-based access controls to limit user actions based on their role, with admins having full privileges.

## Getting Started

### Prerequisites

Before you begin, ensure you have the following installed:
- PHP ^8.0
- Composer
- Laravel 10.x
- A supported database (MySQL, PostgreSQL)

### Installation

Clone the repository:

```bash
git clone https://github.com/satyaadhiyaksaardy/digilib.git
cd digilib
```

Install dependencies:

```bash
composer install
```

Set up your environment:

```bash
cp .env.example .env
```
Edit .env with your database and other environment settings.

Run database migrations and seeders:

```bash
php artisan migrate
php artisan db:seed
```

Generate application key:

```bash
php artisan key:generate
```

Run the local development server:

```bash
php artisan serve
```
You should now be able to access the application at http://localhost:8000.

### Built With

- [Laravel](https://laravel.com/) - The PHP framework used for building the application.
- [MySQL](https://www.mysql.com/) - The primary database used. Laravel supports other databases like PostgreSQL, SQLite, and SQL Server as well.
- [Datatables](https://yajrabox.com/docs/laravel-datatables/10.0/) - jQuery plugin that provides an interactive interface for handling tabular data and integrates seamlessly with Laravel.
- [SweetAlert2](https://sweetalert2.github.io/) - A beautiful, responsive, customizable, and accessible (WAI-ARIA) replacement for JavaScript's popup boxes, used through Laravel's SweetAlert integration.
