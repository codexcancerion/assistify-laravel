# Setup Guide

Follow these steps to set up the Laravel application on your local machine.

---

## Prerequisites

- **PHP**: Version 8.0 or later  
- **Composer**: Dependency manager for PHP   

---

## Setup Instructions

### 1. Clone the Repository
Clone the repository to your local machine:

```bash
git clone https://github.com/codexcancerion/assistify-laravel.git
```
Navigate into the project folder:
```bash
cd assistify-laravel
```

### 2. Install Dependencies
Install PHP dependencies using Composer:
```bash
composer install
```

### 3. Set Up Environment File
Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Note: The SQLite database is already included, so you don't need to configure the database unless specified.

### 4. Generate Application Key
Run the following command to generate the application key:

```bash
php artisan key:generate
```

### 5. Start the Development Server
Serve the application locally:

```bash
php artisan serve
```
Visit the app in your browser at http://127.0.0.1:8000.

### Additional Notes
Ensure the storage and bootstrap/cache directories are writable.

If you encounter any issues, clear the Laravel cache:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

##
### Asstistfy Frontend
Located on [this repo](https://github.com/codexcancerion/assistify-frontend)