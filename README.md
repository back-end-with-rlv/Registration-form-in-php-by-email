# Registration Form in PHP by Email
This repository contains a simple PHP registration form that utilizes email for user authentication. It allows users to sign up, log in, and reset their passwords.

# Home Page

This PHP script (`index.php`) displays a simple home page for authenticated users. It checks if a user is logged in using session management. If a user is logged in, it retrieves user information from the database and displays a personalized greeting message. If no user is logged in, it provides options to log in or sign up.

## Usage

1. Clone this repository.
2. Configure your local environment to run PHP and MySQL.
3. Import the provided SQL file (`database.sql`) to create the necessary database structure.
4. Open `index.php` in a web browser to access the home page.
5. If you are not logged in, you will see options to log in or sign up.
6. If you are logged in, you will see a personalized greeting message with your name and an option to log out.

## Pages

- `login.php`: Provides a login form for users to authenticate.
- `signup_form.php`: Provides a sign-up form for users to register.
- `logout.php`: Logs out the current user and destroys the session.
- `forget_password.php`: Allows users to reset their password if forgotten.
- `reset_password.php`: Allows users to reset their password if forgotten.


# Sign Up Form

This PHP script (`signup_form.php`) provides a simple sign-up form for users to register. It performs validation on form fields and inserts user data into a MySQL database.

1. Open `signup_form.php` in a web browser to access the sign-up form.
2. Enter your name, email, password, and confirm password.
3. Click the "Sign Up" button to register.
4. If successful, you will be redirected to the login page (`login.php`).
   
# Login Page

This PHP script (`login.php`) provides a simple login page for users to authenticate. It verifies user credentials against a MySQL database.

1. Open `login.php` in a web browser to access the login page.
2. Enter your email and password.
3. Click the "Login" button to authenticate.
4. If successful, you will be redirected to the index page (`index.php`).

## Forgot Password

If you forgot your password, you can reset it by visiting the "Forget Password" page (`forget_password.php`).

## PHPMailer Integration

This project uses PHPMailer for sending emails. PHPMailer is a popular email-sending library for PHP that provides a clean and simple interface for sending emails securely via SMTP or mail(). To integrate PHPMailer into your project:

1. Install PHPMailer via Composer by running:
## Requirements

2. Require the necessary PHPMailer files in your PHP scripts where email sending is required. For example:
```php
require 'path/to/PHPMailer/Exception.php';
require 'path/to/PHPMailer/PHPMailer.php';
require 'path/to/PHPMailer/SMTP.php';

- PHP 7.x
- MySQL

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
