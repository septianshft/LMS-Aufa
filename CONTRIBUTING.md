# Contributing to Academy LMS

Thank you for your interest in contributing to Academy LMS! We welcome contributions from everyone.

## 🚀 Getting Started

1. **Fork the repository** on GitHub
2. **Clone your fork** locally:
   ```bash
   git clone https://github.com/your-username/academy-lms.git
   cd academy-lms
   ```
3. **Follow the setup guide** in [CLONE_SETUP.md](CLONE_SETUP.md)

## 🔄 Development Workflow

### 1. Create a Branch
```bash
git checkout -b feature/your-feature-name
# or
git checkout -b bugfix/issue-description
```

### 2. Make Your Changes
- Write clean, readable code
- Follow PSR-4 coding standards
- Add comments for complex logic
- Test your changes thoroughly

### 3. Test Your Changes
```bash
# Run the application
php artisan serve

# Test the development installer
http://localhost:8000/dev-install

# Test basic functionality
# - Login/logout
# - Course creation
# - Student enrollment
```

### 4. Commit Your Changes
```bash
git add .
git commit -m "feat: add new course feature"
# or
git commit -m "fix: resolve payment gateway issue"
```

### 5. Push and Create Pull Request
```bash
git push origin feature/your-feature-name
```

## 📝 Commit Message Guidelines

Use conventional commit messages:

- `feat:` New features
- `fix:` Bug fixes
- `docs:` Documentation changes
- `style:` Code style changes (formatting, etc.)
- `refactor:` Code refactoring
- `test:` Adding or updating tests
- `chore:` Maintenance tasks

## 🐛 Reporting Bugs

When reporting bugs, please include:

1. **Steps to reproduce** the issue
2. **Expected behavior** vs **actual behavior**
3. **Environment details** (PHP version, database, etc.)
4. **Screenshots** if applicable
5. **Error messages** or logs

## 💡 Suggesting Features

For feature requests:

1. **Check existing issues** to avoid duplicates
2. **Describe the problem** you're trying to solve
3. **Propose a solution** or implementation approach
4. **Consider the impact** on existing users

## 🔒 Security Issues

**DO NOT** create public issues for security vulnerabilities. Instead:

1. Email security concerns privately
2. Provide detailed information about the vulnerability
3. Allow time for the issue to be addressed before disclosure

## 📋 Code Guidelines

### PHP Code Style
- Follow PSR-12 coding standard
- Use meaningful variable and function names
- Add PHPDoc comments for public methods
- Keep functions focused and small

### Database Changes
- **DO NOT** use Laravel migrations
- Update `public/assets/install.sql` for schema changes
- Test installation with fresh database
- Document any new environment variables

### Frontend Code
- Use Tailwind CSS for styling
- Follow existing component patterns
- Ensure responsive design
- Test across different browsers

## 🚫 What NOT to Contribute

- **Hardcoded credentials** or API keys
- **Copyrighted content** without permission
- **Breaking changes** without prior discussion
- **Personal configuration** files (`.env`, IDE settings)

## ✅ Pull Request Checklist

Before submitting a PR:

- [ ] Code follows project standards
- [ ] All tests pass
- [ ] Documentation updated if needed
- [ ] No hardcoded sensitive information
- [ ] Changes work with development installer
- [ ] Environment variables added to `.env.example` if needed

## 🤝 Community Guidelines

- Be respectful and constructive
- Help others learn and grow
- Focus on the code, not the person
- Provide helpful feedback
- Be patient with newcomers

## 📞 Getting Help

- **GitHub Discussions**: For questions and general discussion
- **GitHub Issues**: For bug reports and feature requests
- **Code Review**: For feedback on your contributions

## 🎉 Recognition

Contributors will be:
- Listed in project acknowledgments
- Mentioned in release notes for significant contributions
- Invited to join the project team for consistent contributors

Thank you for helping make Academy LMS better for everyone! 🚀
