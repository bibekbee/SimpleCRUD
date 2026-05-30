# SimpleCRUD — Laravel Learning Project

A beginner-friendly **Laravel 11** web application demonstrating essential web development concepts including CRUD operations, user authentication, file uploads, authorization policies, email sending, and queued background jobs. It functions as a simple product store and member management system.

---

## ✨ Features

- **👤 User Authentication** — Registration, login, logout, and password reset via email.
- **👤 Profile Management** — View/edit your name, change password, or delete your account.
- **📦 Product Management (CRUD)** — Create, read, update, and delete products with:
  - Name, price, and quantity
  - Image upload support
  - Pagination (6 per page)
- **⭐ Product Ratings** — Authenticated users can rate products from 0–5 stars. Average ratings are displayed to all visitors.
- **💼 Member/Job Management (CRUD)** — A secondary CRUD module for managing member/job entries with search functionality.
- **🔒 Authorization** — Users can only edit or delete their own products and job entries (Laravel Policies).
- **📧 Email** — Test mail route and password reset functionality.
- **⏳ Queue Jobs** — Demo background job dispatching at `/doajob`.

---

## 🛠️ Tech Stack

### Backend
| Technology | Version | Purpose |
|------------|---------|---------|
| PHP | ^8.2 | Runtime |
| Laravel | ^11.0 | Core framework |
| Laravel Sail | ^1.26 | Docker dev environment (optional) |
| Pest PHP | ^2.34 | Testing framework |

### Frontend
| Technology | Version | Purpose |
|------------|---------|---------|
| Vite | ^5.0 | Build tool |
| Tailwind CSS | ^3.4 | Utility-first CSS |
| Axios | ^1.6 | HTTP client |

### Database
- **MySQL** (configured by default)
- **SQLite** file included for quick local testing

---

## 🗄️ Database Structure

### Application Tables

| Table | Description |
|-------|-------------|
| `users` | Standard Laravel auth (name, email, password) |
| `newjobs` | Member/job entries (`first_name`, `last_name`, `email`, `user_id`) |
| `products` | Store products (`name`, `price`, `quantity`, `image`, `user_id`) |
| `stars` | Product ratings (`user_id`, `product_id`, `rating`) |
| `admins` | Placeholder table (minimal) |

### Laravel System Tables
- `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs`

### Relationships
- `User` → has many `Newjobs`, `Products`, and `Stars`
- `Product` → belongs to `User`, has many `Stars`
- `Newjobs` → belongs to `User`
- `Stars` → belongs to `User` and `Product`

---

## 🚀 Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL (or use the included SQLite file)

### Step-by-step Setup

```bash
# 1. Enter the project directory
cd SimpleCRUD

# 2. Install PHP dependencies
composer install

# 3. Install JavaScript dependencies
npm install

# 4. Create environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate
```

#### Option A: SQLite (Quickest)
```bash
# Edit .env and set:
# DB_CONNECTION=sqlite
# DB_DATABASE=/absolute/path/to/SimpleCRUD/database/database.sqlite

# Run migrations
php artisan migrate

# (Optional) Seed the database
php artisan db:seed
```

#### Option B: MySQL
```bash
# Edit .env and configure your MySQL credentials:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=simplecrud
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Create the database in MySQL, then:
php artisan migrate

# (Optional) Seed the database
php artisan db:seed
```

### Running the Application

**Build frontend assets:**
```bash
# For development (with hot-reload):
npm run dev

# For production:
npm run build
```

**Start the Laravel server:**
```bash
php artisan serve
```

**Access the app at:** `http://localhost:8000`

---

## 🔑 Default Seeded User

After running `php artisan db:seed`, you can log in with:
- **Name:** Jhon Doe
- **Email:** `jhondoe@gmail.com`
- **Password:** `pass`

---

## 📁 Project Structure

```
SimpleCRUD/
├── app/
│   ├── Http/Controllers/
│   │   ├── WelcomeController.php      # Homepage
│   │   ├── ProductController.php      # Product CRUD + ratings
│   │   ├── indexController.php        # Job/member CRUD
│   │   ├── RegisterController.php     # Registration
│   │   ├── SigninController.php       # Login & password reset
│   │   ├── ProfileController.php      # User profile
│   │   └── ViewController.php         # Logout
│   ├── Models/
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Newjobs.php
│   │   ├── Stars.php
│   │   └── admin.php
│   ├── Policies/
│   │   ├── ProductPolicy.php          # Product authorization
│   │   └── NewjobsPolicy.php          # Job authorization
│   ├── Jobs/
│   │   └── aJobLogger.php             # Demo queue job
│   └── Mail/
│       └── firstMailSender.php        # Demo mailable
├── database/
│   ├── migrations/                    # All table schemas
│   └── seeders/
│       └── DatabaseSeeder.php         # Default user + demo data
├── resources/
│   └── views/                         # Blade templates
├── routes/
│   └── web.php                        # All web routes
└── storage/app/public/products/       # Uploaded product images
```

---

## 🌐 Routes Overview

| Route | Method | Access | Description |
|-------|--------|--------|-------------|
| `/` | GET | Public | Homepage |
| `/products` | GET | Public | Product listing (paginated) |
| `/products/create` | GET/POST | Public | Create a new product |
| `/products/{id}` | GET | Auth | Product detail page |
| `/products/{id}/edit` | GET | Auth + Owner | Edit product form |
| `/products/{id}` | PATCH | Auth | Update product |
| `/products/{id}` | DELETE | Auth | Delete product |
| `/rating` | POST | Public | Submit/Update product rating |
| `/create` | GET/POST | Auth | Create a new job entry |
| `/show` | GET | Public | List job entries (searchable) |
| `/show/{job}` | GET | Auth + Owner | Job detail |
| `/show/{job}/edit` | GET | Auth + Owner | Edit job form |
| `/store/{id}` | PATCH | Auth + Owner | Update job |
| `/store/{job}` | DELETE | Auth + Owner | Delete job |
| `/register` | GET/POST | Public | User registration |
| `/signin` | GET/POST | Public | Login |
| `/signin/edit` | POST | Public | Send password reset email |
| `/signin/{token}` | GET/PATCH | Public | Reset password |
| `/setting` | GET | Auth | Profile page |
| `/setting/edit` | POST | Auth | Update name |
| `/setting` | PATCH | Auth | Change password |
| `/setting` | POST | Auth | Delete account |
| `/mail` | GET | Public | Send test email |
| `/doajob` | GET | Public | Dispatch demo queue job |

---

## 🧪 Running Tests

This project uses **Pest PHP** for testing:

```bash
# Run all tests
./vendor/bin/pest

# Or with Artisan
php artisan test
```

---

## ⚠️ Known Limitations

This is a **learning/practice project** with some rough edges typical of a beginner exercise:

1. **Security** — Some models use `$guarded = []` (permissive mass-assignment). The default seeded user stores a plaintext password in the seeder file.
2. **Image Storage** — Product image storage logic may save to the `local` disk instead of `public` in some cases.
3. **Hardcoded Values** — The `/mail` route uses a hardcoded recipient email address.
4. **Queue Job** — The demo job dispatches another closure job inside its handler, which is unconventional.
5. **Admin Table** — The `admins` table migration exists but is essentially a placeholder.
6. **Tests** — Only default example tests are present; no feature-specific tests have been written.

---

## 🎯 Learning Outcomes

This project demonstrates understanding of:
- Laravel routing, controllers, and requests
- Eloquent ORM relationships
- Blade templating with Tailwind CSS
- File uploads with Laravel Storage
- Authentication from scratch (no Breeze/Jetstream)
- Password reset via email tokens
- Authorization with Laravel Policies and Gates
- Database seeders and factories
- Queue jobs and mail sending

---

## 🤝 Contributing

Feel free to fork this project and improve it! Some ideas:
- Add proper form request validation classes
- Write feature tests with Pest
- Refactor auth to use Laravel Breeze or Fortify
- Fix image storage to consistently use the public disk
- Implement proper admin roles
- Add product categories and search/filtering

---

## 📄 License

This project is open-source. See `LICENSE.txt` for details.
