# PHP Basics

## What is PHP?
PHP (Hypertext Preprocessor) is a popular open-source server-side scripting language used for web development. It is widely used to create dynamic web pages and applications.

## Features of PHP
- Open-source and free to use
- Cross-platform compatibility (Windows, macOS, Linux)
- Supports databases like MySQL, PostgreSQL, SQLite
- Embedded within HTML
- Server-side execution

## Installation

### 1. Download PHP
- Official Website: [PHP Downloads](https://www.php.net/downloads)
- Windows users can use [XAMPP](https://www.apachefriends.org/index.html) (which includes PHP, Apache, and MySQL)

### 2. Install PHP
**Windows:** Extract the downloaded PHP zip file and set the environment variable for php.exe.

**Linux/macOS:** Use the package manager:
```sh
sudo apt install php  # Debian/Ubuntu
brew install php      # macOS (Homebrew)
```

### 3. Verify Installation
```sh
php -v
```

## Basic PHP Syntax

### 1. Hello World
```php
<?php
echo "Hello, World!";
?>
```

### 2. Variables and Data Types
```php
<?php
$name = "John";  // String
$age = 25;       // Integer
$isStudent = true; // Boolean

echo "Name: $name, Age: $age";
?>
```

### 3. Conditional Statements
```php
<?php
$score = 85;
if ($score >= 50) {
    echo "You passed!";
} else {
    echo "You failed.";
}
?>
```

### 4. Loops
```php
<?php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}
?>
```

### 5. Functions
```php
<?php
function greet($name) {
    return "Hello, $name!";
}
echo greet("Alice");
?>
```

### 6. Connecting to a Database (MySQL Example)
```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
```

## Useful Resources
- [PHP Official Docs](https://www.php.net/manual/en/)
- [W3Schools PHP Tutorial](https://www.w3schools.com/php/)
- [PHP MySQL Tutorial](https://www.php.net/manual/en/mysqli.quickstart.php)

## How to Use This Repository
1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/php-basics.git
   ```
2. Navigate to the project directory:
   ```sh
   cd php-basics
   ```
3. Run a PHP script:
   ```sh
   php index.php
   ```


