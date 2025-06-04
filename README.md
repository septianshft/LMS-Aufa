# 🎓 Academy LMS - Learning Management System

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.0+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

A comprehensive Learning Management System built with Laravel, designed for educational institutions, online course providers, and corporate training programs.

## ✨ Features

### 🎯 Core Features
- **Multi-Role Support**: Admin, Instructor, Student roles with granular permissions
- **Course Management**: Create, organize, and deliver courses with multimedia content
- **Interactive Learning**: Video streaming, quizzes, assignments, and discussions
- **Progress Tracking**: Detailed analytics and progress monitoring
- **Certification System**: Automated certificate generation upon course completion

### 💰 E-commerce Integration
- **Course Marketplace**: Sell courses with integrated payment gateways
- **Multiple Payment Options**: Razorpay, Stripe, PayPal support
- **Coupon & Discount System**: Flexible pricing and promotional tools
- **Purchase Management**: Complete order and transaction handling

### 🎨 Modern Interface
- **Responsive Design**: Mobile-first approach with Tailwind CSS
- **Dark/Light Theme**: User preference-based theme switching
- **Interactive Dashboard**: Real-time analytics and insights
- **Modern UI Components**: Clean and intuitive user experience

### 🔧 Technical Features
- **API Integration**: RESTful APIs for mobile app development
- **Multi-Language Support**: Internationalization ready
- **File Management**: Advanced upload and storage system
- **Email System**: Automated notifications and communication
- **SEO Optimized**: Built-in SEO tools and optimization

## 🚀 Quick Start

### For Developers (Recommended)
The fastest way to get started is using our development installer:

```bash
# Clone the repository
git clone https://github.com/septianshft/LMS-Aufa.git
cd LMS-Aufa

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then visit:
http://localhost/your-project/dev-install
```

**📖 Need detailed setup instructions?** See [CLONE_SETUP.md](CLONE_SETUP.md) for comprehensive installation guide.

### Default Credentials
- **Admin**: admin@academy.com / admin123
- **Student**: student@academy.com / student123

## 📋 Requirements

- **PHP**: 8.0 or higher
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **Web Server**: Apache/Nginx
- **Composer**: Latest version
- **Node.js**: 16+ (for asset compilation)

## 🛠️ Technology Stack

- **Backend**: Laravel 10.x
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL/MariaDB
- **Payment**: Razorpay, Stripe, PayPal
- **Media**: Video streaming, File uploads
- **Email**: SMTP, Mailgun support
- **Cache**: Redis (optional)

## 📊 System Architecture

```
Academy LMS
├── 👨‍💼 Admin Panel          # System administration
├── 👨‍🏫 Instructor Dashboard  # Course creation & management
├── 👨‍🎓 Student Portal       # Learning interface
├── 🛒 Marketplace           # Course purchasing
├── 📱 API Endpoints         # Mobile app support
└── 📧 Communication         # Email & notifications
```

## 🔧 Configuration

### Environment Variables
Key configurations in your `.env` file:

```env
# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=academy_lms

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host

# Payment Gateways (Optional for development)
RAZORPAY_KEY=your_key
RAZORPAY_SECRET=your_secret

# API Keys (Contact admin for production)
ENVATO_PERSONAL_TOKEN=your_token
```

## 🎯 Usage

### For Administrators
- Access admin panel at `/admin`
- Manage users, courses, and system settings
- Monitor analytics and generate reports
- Configure payment gateways and integrations

### For Instructors
- Create and manage courses
- Upload video content and materials
- Track student progress and engagement
- Generate completion certificates

### For Students
- Browse and purchase courses
- Access learning materials and videos
- Take quizzes and submit assignments
- Track learning progress

## 🔒 Security Features

- **Secure Authentication**: Multi-role login system
- **API Protection**: Token-based authentication
- **Data Encryption**: Sensitive data protection
- **File Validation**: Secure upload system
- **SQL Injection Prevention**: Parameterized queries
- **XSS Protection**: Input sanitization

## 🤝 Contributing

We welcome contributions! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines.

### Development Workflow
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Write tests for new features
5. Submit a pull request

## 📞 Support

- **Documentation**: [CLONE_SETUP.md](CLONE_SETUP.md)
- **Issues**: [GitHub Issues](https://github.com/septianshft/LMS-Aufa/issues)
- **Discussions**: [GitHub Discussions](https://github.com/septianshft/LMS-Aufa/discussions)

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙌 Acknowledgments

- Built with [Laravel](https://laravel.com)
- UI styled with [Tailwind CSS](https://tailwindcss.com)
- Icons by [Heroicons](https://heroicons.com)

---

⭐ **Star us on GitHub** if this project helped you!
