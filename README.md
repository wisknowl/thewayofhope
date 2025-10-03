# The Way of Hope - NGO Website

A comprehensive, multi-lingual website for The Way of Hope, a legally registered NGO in Bafang, Cameroon.

## Features

- **Multi-language Support**: English, French, and Spanish
- **Responsive Design**: Mobile-first approach with modern UI
- **Secure Architecture**: MVC pattern with security best practices
- **Content Management**: Admin panel for content management
- **E-commerce**: Online store for NGO merchandise
- **Payment Integration**: Multiple payment gateways
- **Volunteer Management**: Registration and management system
- **Donation System**: Secure donation processing
- **News & Events**: CMS-driven content system

## Technology Stack

- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Backend**: PHP 7.4+ with custom MVC framework
- **Database**: MySQL 5.7+
- **Security**: TLS/SSL, CSRF protection, input sanitization

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- SSL certificate (for production)

### Setup Instructions

1. **Clone/Download the project**

   ```bash
   git clone [repository-url]
   cd thewayofhope
   ```

2. **Database Setup**

   ```bash
   # Create database
   mysql -u root -p
   CREATE DATABASE wayofhope_db;

   # Import schema
   mysql -u root -p wayofhope_db < database/schema.sql
   ```

3. **Configuration**

   - Edit `config/config.php` with your database credentials
   - Update site URL and other settings
   - Set up email configuration for contact forms

4. **File Permissions**

   ```bash
   chmod 755 public/uploads/
   chmod 644 config/config.php
   ```

5. **Web Server Configuration**
   - Point document root to `public/` directory
   - Enable URL rewriting
   - Configure SSL certificate

### Default Admin Access

- **Username**: admin
- **Password**: admin123
- **URL**: /admin

**Important**: Change the default password immediately after first login!

## Project Structure

```
Thewayofhope/
├── public/                 # Web-accessible files
│   ├── index.php          # Main entry point
│   ├── assets/            # CSS, JS, images
│   └── uploads/           # User uploads
├── app/                   # Application logic
│   ├── controllers/       # MVC Controllers
│   ├── models/           # Database models
│   ├── views/            # Templates
│   └── core/             # Core framework files
├── config/               # Configuration files
├── database/             # SQL files and migrations
├── admin/               # Admin panel
└── languages/           # Multi-language files
```

## Brand Guidelines

- **Primary Blue**: #1a4f8c
- **Accent Yellow**: #f4c824
- **Background White**: #ffffff
- **Text Dark Grey**: #333333

## Security Features

- CSRF token protection
- Input sanitization and validation
- Password hashing
- SQL injection prevention
- XSS protection
- Secure session management

## Multi-language Support

The website supports three languages:

- English (en) - Default
- French (fr)
- Spanish (es)

Language files are located in the `languages/` directory.

## Payment Gateways

Configured for:

- PayPal
- MTN Mobile Money
- Orange Money
- Bank Transfer

## Admin Panel Features

- Content management (pages, posts, events)
- Volunteer management
- Donation tracking
- Store management
- Gallery management
- User management

## Development

### Adding New Pages

1. Create controller in `app/controllers/`
2. Add route in `app/core/Router.php`
3. Create view in `app/views/`
4. Update navigation if needed

### Adding New Languages

1. Create language file in `languages/`
2. Add to `SUPPORTED_LANGUAGES` in config
3. Update language switcher

## Production Deployment

1. **Security Checklist**

   - Change default admin password
   - Update encryption keys
   - Enable SSL/TLS
   - Disable error reporting
   - Set secure file permissions

2. **Performance Optimization**

   - Enable caching
   - Optimize images
   - Minify CSS/JS
   - Configure CDN if needed

3. **Backup Strategy**
   - Regular database backups
   - File system backups
   - Test restore procedures

## Support

For technical support or questions about the website, contact the development team.

## License

This project is proprietary software developed for The Way of Hope NGO.

---

**The Way of Hope** - Breaking down inequalities across all layers of society.
