<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            color: #343a40;
        }

        header {
            width: 100%;
            padding: 20px 40px;
            background-color: #343a40;
            color: #fff;
            position: absolute;
            top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
        }

        header .login-link {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            border: 2px solid #fff;
            padding: 5px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        header .login-link i {
            margin-right: 8px;
        }

        header .login-link:hover {
            background-color: #fff;
            color: #343a40;
        }

        main {
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
        }

        img {
            width: 150px;
            height: auto;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <header>
        <div>My Laravel Application</div>
        <a href="{{ route('login') }}" class="login-link">
            <i class="fas fa-sign-in-alt"></i>Login
        </a>
    </header>
    <main>
        <h1>Welcome to My Laravel Application</h1>
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
        <p>This is the landing page.</p>
    </main>
</body>

</html>
