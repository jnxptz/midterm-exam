<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel
## Updated by Branden for collaboration test

## Author : Janial Bacani, Basco Branden
## Updated by Janial for collaboration test

# Description
### A Transaction Processing System (TPS) is a computerized system used to record, process, and manage routine business transactions efficiently and accurately. It handles data, such as sales, payments, and orders, ensuring that each transaction is completed successfully and stored securely. TPS helps organizations maintain up-to-date records, support daily operations, and improve decision-making through reliable and real-time data processing.

# Objectives
### Transaction Processing System (TPS) that efficiently records, manages, and monitors business transactions. This system is designed to assist businesses in tracking products, sales, and transactions in real time, ensuring accurate data management, organized records, and streamlined operations.

# Features
### The primary objective of the Transaction Processing System (TPS) is to provide accurate and organized information regarding business operations. The system displays the total number of products, total transactions, overall sales, and items with low stock levels. In the Products module, users can view a comprehensive list of available products, including details such as product name, price, stock quantity, and purchase amount. The system also allows authorized users to add new products by specifying essential information such as the product name, price, and quantity. Meanwhile, the Transactions module records and presents transaction details, including the buyer’s identification number, name, purchased items, quantity, total amount, and date of purchase. This ensures efficient monitoring and management of sales activities within the organization.

# Installation Instruction
### The following steps explain how to set up and run the Transaction Processing System project, which is built using the Laravel framework:

1. Install PHP and Composer 
- Ensure that PHP (version 8.0 or higher) and Composer are installed on your computer. Composer is required to manage Laravel dependencies.

2. Install Dependencies:
- Install all Laravel dependencies using Composer:

3. Set Up Environment File:
- Copy the example environment file and configure your database and other settings:
- Open the .env file and update the following settings according to your database configuration:

5. Generate Application Key:
- Generate a unique application key for Laravel:

6.  Run Migrations (Set Up Database):
- Create the necessary tables in your database:

7. Run the Laravel Development Server:
- Start the project locally:

# Usage
1. Access the System:

- Open your web browser and go to http://127.0.0.1:8000 (or the URL where the system is hosted).

2. View Products:

- Go to the Products tab to see a list of available products.

- Each product displays the name, price, stock quantity, and available purchase quantity.

3. Add a New Product:

- Click the Add Product button.

- Enter the product name, price, and quantity, then save.

4. Make a Transaction:

- Select the product(s) the buyer wants to purchase.

- Enter the quantity and confirm the transaction.

-  The system will automatically calculate the total amount and update the stock.

5. View Transactions:

- Go to the Transactions tab to see a list of all purchases.

- Each transaction shows the buyer’s ID, name, purchased products, quantity, total amount, and date of purchase.

6. Check Low Stock:

- The system highlights products with low stock, allowing you to restock in time.

# Screeenshots 

```<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalSales = Transaction::sum('total');
        $lowStock = Product::where('stock', '<=', 5)->count();

        return view('dashboard', compact(
            'totalProducts',
            'totalTransactions',
            'totalSales',
            'lowStock'
        ));
    }
}
```


Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
"# midterm-exam" 
"test line" 
