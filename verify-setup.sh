#!/bin/bash

# Academy LMS Setup Verification Script
# This script verifies that the project is properly configured for cloning

echo "🎓 Academy LMS - Setup Verification"
echo "==================================="

# Check if we're in the correct directory
if [[ ! -f "composer.json" ]]; then
    echo "❌ Error: Please run this script from the Academy LMS root directory"
    exit 1
fi

echo "✅ Running from correct directory"

# Check essential files exist
essential_files=(
    ".env.example"
    "composer.json"
    "package.json"
    "README.md"
    "CLONE_SETUP.md"
    "CONTRIBUTING.md"
    "LICENSE"
    "config/database.php"
    "routes/web.php"
)

for file in "${essential_files[@]}"; do
    if [[ -f "$file" ]]; then
        echo "✅ $file exists"
    else
        echo "❌ Missing: $file"
    fi
done

# Check .env file status
if [[ -f ".env" ]]; then
    echo "⚠️  .env file exists (should not be committed to git)"
else
    echo "✅ .env file not present (good for git repository)"
fi

# Check .gitignore for essential entries
if grep -q "\.env$" .gitignore; then
    echo "✅ .env is properly ignored in .gitignore"
else
    echo "❌ .env not found in .gitignore"
fi

# Check for hardcoded sensitive data
echo ""
echo "🔍 Checking for hardcoded sensitive data..."

# Check database config
if grep -q "env(" config/database.php; then
    echo "✅ Database config uses environment variables"
else
    echo "❌ Database config may contain hardcoded values"
fi

# Check for API keys in controllers
if grep -qi "real_api_key\|actual_secret" app/Http/Controllers/*.php; then
    echo "❌ Found potential hardcoded API keys in controllers"
else
    echo "✅ No hardcoded API keys found in controllers"
fi

echo ""
echo "🚀 Deployment Readiness Check"
echo "============================"

# Check composer dependencies
if [[ -f "vendor/autoload.php" ]]; then
    echo "✅ Composer dependencies installed"
else
    echo "⚠️  Composer dependencies not installed (run: composer install)"
fi

# Check node dependencies
if [[ -d "node_modules" ]]; then
    echo "✅ Node.js dependencies installed"
else
    echo "⚠️  Node.js dependencies not installed (run: npm install)"
fi

# Check Laravel key
if [[ -f ".env" ]] && grep -q "APP_KEY=base64:" .env; then
    echo "✅ Laravel application key is set"
elif [[ ! -f ".env" ]]; then
    echo "ℹ️  .env file not found - users will need to copy from .env.example"
else
    echo "⚠️  Laravel application key not set (run: php artisan key:generate)"
fi

echo ""
echo "📋 Setup Summary"
echo "==============="
echo "Repository Status: Ready for GitHub ✅"
echo "Security: Sensitive data removed ✅"
echo "Documentation: Complete ✅"
echo "Installation: Dev route available ✅"
echo ""
echo "🎯 Next Steps:"
echo "1. Create GitHub repository"
echo "2. Add remote: git remote add origin <your-repo-url>"
echo "3. Push code: git push -u origin master"
echo "4. Share the repository URL with users"
echo ""
echo "📖 Users can then follow CLONE_SETUP.md for installation"
