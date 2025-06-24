# Shipment System

## Overview
This is a legacy PHP-based shipment management system for handling shipment requests, status tracking, cancellations, employee and customer registration, and invoice generation. The system supports both admin and customer roles, ensuring secure access and efficient shipment operations.

## Features
- User authentication (admin, employee, customer)
- Admin dashboard for managing shipments and users
- Customer portal for requesting and tracking shipments
- Shipment status updates and cancellation
- Employee and customer registration
- Invoice generation (PDF)
- Responsive UI with Bootstrap

## Project Structure
```
/ (root)
├── *.php                # Main PHP entry points (admin, login, register, etc.)
├── css/                 # Stylesheets
├── js/                  # JavaScript files
├── img/                 # Images
├── fonts/               # Fonts
├── vendor/              # Composer dependencies (mpdf, fpdi, etc.)
├── DashBord/            # Modular admin dashboard (MVC-like)
│   ├── php/
│   │   ├── dB/          # Database connection
│   │   ├── functions/   # Business logic
│   │   └── routes/      # Routing
│   └── view/            # UI components
├── Database/            # SQL schema
└── ...
```

## Requirements
- PHP 7.x or higher
- MySQL or MariaDB
- Composer (for dependency management)

## Setup Instructions
1. **Clone the repository**
2. **Install dependencies**
   ```
   composer install
   ```
3. **Configure the database**
   - Import the SQL schema from `Database/dispatchers.sql` into your MySQL/MariaDB server.
   - Update database credentials in the relevant PHP files (e.g., `functions.php`, `DashBord/php/dB/db_connect.php`).
4. **Run the application**
   - Place the project in your web server's root directory (e.g., `htdocs` for XAMPP).
   - Access via `http://localhost/Shipment-system/`.

## Security Notes
- Ensure all user input is validated and sanitized to prevent SQL injection and XSS.
- Use HTTPS in production.
- Change default credentials after setup.

## Dependencies
- [mpdf/mpdf](https://github.com/mpdf/mpdf) - PDF generation
- [setasign/fpdi](https://github.com/Setasign/FPDI) - PDF manipulation
- [paragonie/random_compat](https://github.com/paragonie/random_compat) - Random compatibility
- [psr/log](https://github.com/php-fig/log) - Logging interface

## License
This project is for educational and demonstration purposes. See individual library licenses in the `vendor/` directory.

## Future Improvements
- Refactor to use prepared statements for all database queries
- Migrate to a modern framework (e.g., Laravel, Symfony)
- Add automated tests
- Improve error handling and logging
- Implement RESTful API endpoints

---

For questions or contributions, please open an issue or submit a pull request.
