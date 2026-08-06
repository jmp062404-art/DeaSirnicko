# DeaSirnicko - Laravel Application

A modern Laravel 12 application built with Breeze authentication, Vite, and TailwindCSS.

## 🚀 Features

- **Laravel 12** - Latest Laravel framework
- **PHP 8.3** - Modern PHP version
- **Vite 7** - Lightning-fast asset bundling
- **TailwindCSS 3** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Laravel Breeze** - Authentication scaffolding
- **Queue System** - Database-driven background jobs
- **File Management** - Upload and manage files
- **Multi-College Support** - Organizational structure
- **Job Orders** - Work order management
- **Permits & Payments** - Transaction handling
- **Reports** - Data visualization and reporting

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL 8.0+ or PostgreSQL 14+
- Git

## 🛠️ Local Development Setup

### 1. Clone the Repository
```bash
git clone <your-repo-url>
cd DeaSirnicko
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
Configure your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=deadelaroca
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Build Assets
```bash
npm run build
# or for development with hot reload
npm run dev
```

### 7. Start Development Server
```bash
php artisan serve
```

Visit: http://localhost:8000

## 🚢 Railway Deployment

This project is optimized for Railway deployment with Docker.

### Quick Deploy
[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/new)

### Manual Deployment
See detailed instructions in [DEPLOYMENT.md](DEPLOYMENT.md)

**Quick steps:**
1. Push code to GitHub
2. Connect to Railway
3. Add MySQL/PostgreSQL database
4. Set environment variables
5. Deploy!

## 📁 Project Structure

```
DeaSirnicko/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/          # Authentication controllers
│   │   │   ├── CollegeController.php
│   │   │   ├── FileController.php
│   │   │   ├── ItemController.php
│   │   │   ├── JobOrderController.php
│   │   │   ├── PaymentController.php
│   │   │   ├── PermitController.php
│   │   │   └── ReportController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   ├── Models/
│   │   ├── College.php
│   │   ├── File.php
│   │   ├── Item.php
│   │   ├── JobOrder.php
│   │   ├── Payment.php
│   │   ├── Permit.php
│   │   └── User.php
│   └── View/
│       └── Components/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── api.php
│   ├── auth.php
│   └── web.php
├── docker/                    # Docker configuration
│   ├── default.conf          # Nginx config
│   ├── nginx.conf
│   └── supervisord.conf
├── Dockerfile                # Production Docker image
├── railway.toml              # Railway configuration
└── DEPLOYMENT.md             # Deployment guide
```

## 🔧 Development Commands

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Clear Cache
```bash
php artisan optimize:clear
```

### Queue Worker
```bash
php artisan queue:work
```

### Database Seeding
```bash
php artisan db:seed
```

## 🌐 API Routes

- `/api/colleges` - College management
- `/api/items` - Inventory items
- `/api/job-orders` - Work orders
- `/api/payments` - Payment processing
- `/api/permits` - Permit management
- `/api/reports` - Data reports

## 👥 User Roles

The application includes role-based access control:
- **Admin** - Full system access
- **Staff** - Department operations
- **User** - Limited access

## 🔒 Security

- Laravel Breeze authentication
- CSRF protection
- SQL injection prevention
- XSS protection
- Password hashing with bcrypt
- Rate limiting
- Secure headers

## 📝 Environment Variables

Key environment variables:

```env
APP_NAME=DeaSirnicko
APP_ENV=production
APP_KEY=                    # Generate with: php artisan key:generate
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🆘 Support

For issues and questions:
- Create an issue in the repository
- Check [DEPLOYMENT.md](DEPLOYMENT.md) for deployment help
- Review Laravel documentation: https://laravel.com/docs

## 🎯 Roadmap

- [ ] Enhanced reporting dashboard
- [ ] PDF export functionality
- [ ] Email notifications
- [ ] API documentation
- [ ] Mobile-responsive improvements
- [ ] Real-time notifications with WebSockets

---

**Built with ❤️ using Laravel 12**
