<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Universities and Colleges Locator System - README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        ol {
            padding-left: 20px;
        }
        pre {
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
            color: #333;
            border-radius: 4px;
            margin: 10px 0;
            overflow-x: auto;
        }
        h2 {
            color: #555;
            margin-top: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .note {
            background-color: #e9ecef;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin: 15px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Running the State Universities and Colleges Locator System</h1>
        
        <p>Follow these steps to run the system locally:</p>
        
        <ol>
            <li><strong>Open Laragon</strong><br>Start by opening Laragon (your local development environment).</li>
            <li><strong>Start the Database</strong><br>In Laragon, click on "Start All" to start the database and services.</li>
            <li><strong>Open the Terminal</strong><br>Next, click on "Terminal" in Laragon to open the command line interface.</li>
            <li><strong>Change Directory</strong><br>In the terminal, change the directory to your project folder by typing the following command:
                <pre>cd heilocator</pre>
            </li>
            <li><strong>Start the Development Server</strong><br>Once you've changed to the correct directory, start the development server by typing the following command:
                <pre>php artisan serve</pre>
                This will start the Laravel development server.
            </li>
            <li><strong>Open a New Terminal Tab</strong><br>Open another tab of the terminal. Be sure to change the directory again:
                <pre>cd heilocator</pre>
            </li>
            <li><strong>Compile and Build Assets</strong><br>In the second terminal tab, run the following command to compile and build assets for your Laravel application:
                <pre>npm run dev</pre>
            </li>
            <li><strong>Access the System in Your Browser</strong><br>Open your browser and go to the following URL:
                <pre>localhost:8000</pre>
                This will redirect you to the State Universities and Colleges Locator System.
            </li>
            <li><strong>Login Credentials</strong><br>On the login screen, use the following credentials:
                <ul>
                    <li><strong>Username:</strong> chedro12@ched.gov.ph</li>
                    <li><strong>Password:</strong> Tuazon-fr123</li>
                </ul>
                After logging in, you will be redirected to the homepage.
            </li>
            <li><strong>Access the HEI List</strong><br>On the homepage, click the "Continue to HEI list" button. This will take you to the HEI table, where you can start performing CRUD operations (Create, Read, Update, Delete) on the Higher Education Institutions (HEI) data.</li>
        </ol>
        
        <div class="note">
            <p><strong>Note:</strong> Make sure all dependencies are installed before running the system, including PHP, Composer, and Node.js.</p>
        </div>
    </div>

</body>
</html>

## About Laravel

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

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
