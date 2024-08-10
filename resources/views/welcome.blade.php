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
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
        }

        .menu {
            display: flex;
            margin-left: 120px;
            gap: 55px;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #adb5bd;
        }

        .login-link {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            border: 2px solid #fff;
            padding: 5px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            position: absolute;
            right: 40px;
            top: 20px;
        }

        .login-link i {
            margin-right: 8px;
        }

        .login-link:hover {
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

        /* Hide menu-toggle by default */
        .menu-toggle {
            display: none;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu {
                display: none;
                flex-direction: column;
                width: 50%;
                background-color: #343a40;
            }

            .menu a {
                padding: 10px 20px;
                text-align: left;
            }

            /* Show menu-toggle on mobile devices */
            .menu-toggle {
                display: block;
                cursor: pointer;
                font-size: 24px;
                color: #fff;
                margin-left: auto;
            }

            /* Show menu when menu-toggle is active */
            .menu-toggle.active+.menu {
                display: flex;
            }

            .login-link {
                position: relative;
                right: 0;
                top: 0;
                margin-left: 20px;
                margin-bottom: 10px;
            }

            /* Toggle icon transformation */
            .menu-toggle.active i {
                transform: rotate(0);
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>
        <div class="menu">
            @foreach ($menus as $menu)
                <a href="{{ $menu->url }}">{{ $menu->name }}</a>
            @endforeach
            <a href="{{ route('login') }}" class="login-link">
                <i class="fas fa-sign-in-alt"></i>Login
            </a>
        </div>
    </header>
    {{-- <main>
        <h1>Welcome to My Laravel 11.x Application</h1>
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
        <p>This is the landing page.</p>
    </main> --}}
    <main>
        <h1>{{ $content->title ?? 'Default Title' }}</h1>
        <img src="{{ asset('storage/' . ($content->image ?? 'default.jpg')) }}" alt="Content Image"
            style="max-width: 100%; max-height: 500px; width: auto; height: auto;">
        <p>{{ $content->body ?? 'Default content body' }}</p>
    </main>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.menu').classList.toggle('active');

            // Toggle between the "bars" icon and the "X" icon
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
</body>

</html>
