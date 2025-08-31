# WordPress Security Guide

Securing your WordPress site is essential to protect your data, users, and reputation. This guide covers best practices and recommended plugins to help you maintain a secure WordPress installation.

## Best Practices for WordPress Security

### 1. Keep WordPress, Themes, and Plugins Updated
- Always update WordPress core, themes, and plugins to the latest versions.
- Remove unused themes and plugins to reduce vulnerabilities.

### 2. Use Strong Passwords and User Permissions
- Enforce strong passwords for all users, especially administrators.
- Limit the number of admin accounts and assign the least privilege necessary to each user.

### 3. Secure the Login Page
- Change the default login URL from `/wp-login.php` to a custom URL.
- Limit login attempts to prevent brute-force attacks.
- Enable two-factor authentication (2FA) for all users.

### 4. Use HTTPS/SSL
- Install an SSL certificate and force HTTPS for all traffic.
- Update your WordPress settings to use HTTPS URLs.

### 5. Regular Backups
- Schedule regular backups of your database and files.
- Store backups securely offsite or in the cloud.

### 6. File and Directory Permissions
- Set correct file permissions (typically 644 for files and 755 for directories).
- Restrict write access to critical files like `wp-config.php`.

### 7. Disable Directory Listing
- Prevent directory listing by adding `Options -Indexes` to your `.htaccess` file.

### 8. Protect wp-config.php
- Move `wp-config.php` one directory above the web root if possible.
- Deny access to `wp-config.php` via `.htaccess`:
	```apache
	<files wp-config.php>
		order allow,deny
		deny from all
	</files>
	```

### 9. Disable XML-RPC if Not Needed
- XML-RPC can be exploited for DDoS and brute-force attacks. Disable it if not required.

### 10. Monitor and Audit
- Regularly monitor logs for suspicious activity.
- Use security plugins to scan for malware and vulnerabilities.

## Recommended Security Plugins

### 1. All in One WP Security & Firewall
- Comprehensive security plugin with features like login lockdown, firewall, file integrity monitoring, and more.
- Easy to use and suitable for all levels.
- [All in One WP Security & Firewall](https://wordpress.org/plugins/all-in-one-wp-security-and-firewall/)

### 2. Wordfence Security
- Real-time threat defense, firewall, malware scanner, and login security.
- [Wordfence Security](https://wordpress.org/plugins/wordfence/)

### 3. Sucuri Security
- Security activity auditing, file integrity monitoring, malware scanning, and security hardening.
- [Sucuri Security](https://wordpress.org/plugins/sucuri-scanner/)

### 4. iThemes Security
- Protects against common vulnerabilities, enforces strong passwords, and offers 2FA.
- [iThemes Security](https://wordpress.org/plugins/better-wp-security/)

## Additional Tips
- Change the WordPress database table prefix from `wp_` to something unique during installation.
- Disable editing of files from the WordPress dashboard by adding `define('DISALLOW_FILE_EDIT', true);` to `wp-config.php`.
- Use a web application firewall (WAF) for additional protection.

---
By following these best practices and using recommended plugins, you can significantly improve the security of your WordPress site.
