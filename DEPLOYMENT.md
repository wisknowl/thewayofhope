# The Way of Hope - Deployment Guide

## Local Development Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- Composer (optional, for dependencies)

### Local Setup Steps

1. **Clone/Download the project**

   ```bash
   # If using Git
   git clone [repository-url]
   cd thewayofhope

   # Or download and extract the ZIP file
   ```

2. **Set up local web server**

   - Place the project in your web server directory (e.g., `htdocs`, `www`, `public_html`)
   - Ensure Apache has mod_rewrite enabled
   - Point document root to the project directory

3. **Configure database**

   ```sql
   -- Create database
   CREATE DATABASE wayofhope_db;

   -- Import schema
   mysql -u root -p wayofhope_db < database/schema.sql
   ```

4. **Update configuration**

   - Edit `config/config.php` with your local database credentials
   - Update `SITE_URL` to your local URL (e.g., `http://localhost/thewayofhope`)

5. **Set permissions**

   ```bash
   chmod 755 public/uploads/
   chmod 644 config/config.php
   ```

6. **Test the setup**
   - Visit `http://localhost/thewayofhope/setup_local.php`
   - Check all requirements are met
   - Access the website at `http://localhost/thewayofhope/public/`
   - Test admin panel at `http://localhost/thewayofhope/public/admin/` (admin / admin123)

## Hostinger Deployment

### Pre-deployment Checklist

- [ ] Test all functionality locally
- [ ] Update all placeholder content
- [ ] Add real images and media
- [ ] Test payment gateways (if applicable)
- [ ] Backup local database

### Hostinger Setup Steps

1. **Upload files to Hostinger**

   - Upload all project files to your domain's `public_html` directory
   - Ensure `.htaccess` file is uploaded
   - Set proper file permissions (755 for directories, 644 for files)

2. **Create database on Hostinger**

   - Log into Hostinger control panel
   - Go to "MySQL Databases"
   - Create a new database
   - Create a database user with full privileges
   - Note down the database credentials

3. **Update production configuration**

   - Copy `config/production.php` to `config/config.php`
   - Update database credentials with your Hostinger details
   - Update `SITE_URL` to your domain
   - Update email settings with your Hostinger email
   - Change the encryption key to a unique value

4. **Import database**

   - Use phpMyAdmin or MySQL command line
   - Import `database/schema.sql` into your Hostinger database

5. **Configure SSL (if not already enabled)**

   - Enable SSL certificate in Hostinger control panel
   - Update `.htaccess` to force HTTPS (uncomment the HTTPS redirect lines)

6. **Test the live website**
   - Visit your domain
   - Test all pages and functionality
   - Test admin panel login
   - Test forms and submissions

### Post-deployment Tasks

1. **Security**

   - Change default admin password
   - Update encryption keys
   - Enable HTTPS
   - Set up regular backups

2. **SEO**

   - Submit sitemap to Google Search Console
   - Set up Google Analytics (if desired)
   - Test social media sharing

3. **Performance**

   - Enable caching in Hostinger control panel
   - Optimize images
   - Test page load speeds

4. **Content**
   - Add real content and images
   - Test all forms
   - Set up email notifications
   - Configure payment gateways

## Troubleshooting

### Common Issues

1. **404 Errors**

   - Check that mod_rewrite is enabled
   - Verify `.htaccess` file is uploaded
   - Check file permissions

2. **Database Connection Errors**

   - Verify database credentials
   - Check database exists
   - Ensure user has proper permissions

3. **Permission Errors**

   - Set correct file permissions
   - Ensure web server can read files
   - Check upload directory permissions

4. **SSL Issues**
   - Verify SSL certificate is active
   - Check HTTPS redirects
   - Update mixed content warnings

### Support

- Check Hostinger documentation
- Contact Hostinger support for server issues
- Review PHP error logs in Hostinger control panel

## Maintenance

### Regular Tasks

- Update content regularly
- Monitor website performance
- Backup database weekly
- Update security patches
- Review and respond to contact forms

### Security Updates

- Keep PHP version updated
- Monitor for security vulnerabilities
- Regular password updates
- Review access logs

---

**The Way of Hope** - Breaking down inequalities across all layers of society.
