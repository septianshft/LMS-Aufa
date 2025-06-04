# Academy LMS - Clone Setup Guide

This guide will help you clone and set up the Academy LMS project for development.

## 🚀 Quick Setup for Development

### Prerequisites
- PHP 8.0 or higher
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Step 1: Clone the Repository
```bash
git clone https://github.com/septianshft/Clone-Aufa-FIX.git
cd Clone-Aufa-FIX
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Environment Setup
```bash
# Copy the environment template
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Configure Database
Edit your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 5: Get API Keys (Optional for Development)
Ask your team lead for these keys and add them to your `.env`:
```env
# Envato API Configuration (for production features)
ENVATO_PERSONAL_TOKEN=your_token_here
ENVATO_PERSONAL_TOKEN_ALT=your_alt_token_here

# Razorpay Configuration (for payment features)
RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret
```

**Note:** The application will work in development mode without these keys!

### Step 6: Database Installation
Create your database first, then run:
```bash
# Visit this URL in your browser
http://localhost/your-project-folder/dev-install
```

This will:
- Install all database tables
- Create sample data
- Create admin account: `admin@academy.com` / `admin123`

### Step 7: Access the Application
- **Frontend:** `http://localhost/your-project-folder`
- **Admin Panel:** `http://localhost/your-project-folder/login`
- **Admin Credentials:** `admin@academy.com` / `admin123`

## 🔧 Alternative Installation Methods

### Method 1: Standard Web Installer (Production-like)
If you have the API keys, you can use the standard installer:
1. Visit: `http://localhost/your-project-folder/install/step0`
2. Follow the installation wizard

### Method 2: Manual Database Setup
If you prefer manual setup:
1. Import `public/assets/install.sql` into your database
2. Update the settings table with your configuration
3. Create an admin user manually

## ⚠️ Important Notes

### For Development Team:
- **Never commit `.env` files** - they contain sensitive data
- Use `.env.example` as a template
- API keys should be shared securely (not through Git)

### Database Considerations:
- This project uses a **custom installer** instead of Laravel migrations
- The database structure is defined in `public/assets/install.sql`
- Regular Laravel migration commands won't work

### API Keys Security:
- **Envato tokens** are for purchase verification (can be skipped in dev)
- **Razorpay keys** are for payment processing (test keys for dev)
- Production keys should never be in the repository

## 🐛 Troubleshooting

### Common Issues:

1. **500 Error after cloning:**
   - Check database connection in `.env`
   - Ensure database exists
   - Run `/dev-install` route

2. **Purchase Code Validation Failed:**
   - In development, this is bypassed automatically
   - For production, ensure `ENVATO_PERSONAL_TOKEN` is set

3. **Payment Gateway Errors:**
   - Use test/sandbox keys for development
   - Contact team lead for production keys

4. **Database Connection Issues:**
   - Verify MySQL is running
   - Check database credentials in `.env`
   - Ensure database exists

### Development vs Production:
- **Development:** API validation is skipped, test payments
- **Production:** Requires valid Envato license and live payment keys

## 📁 Project Structure

```
Academy-LMS/
├── app/Http/Controllers/
│   ├── InstallController.php      # Custom installer
│   └── SettingController.php      # API key management
├── config/database.php            # Database configuration
├── public/assets/install.sql      # Database structure
├── routes/web.php                 # Includes dev routes
├── .env.example                   # Environment template
└── CLONE_SETUP.md                # This guide
```

## 🤝 Team Collaboration

### When Sharing Code:
1. **Always use `.env.example`** for environment variables
2. **Never commit sensitive keys** to Git
3. **Share API keys privately** (encrypted messages, etc.)
4. **Document any new environment variables** in `.env.example`

### For New Team Members:
1. Clone the repository
2. Follow this setup guide
3. Ask team lead for production API keys
4. Use development mode for initial setup

---

**Need Help?** Contact your team lead or check the original Academy LMS documentation.
