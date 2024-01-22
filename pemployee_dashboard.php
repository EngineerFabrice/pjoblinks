

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - JobLinks Rwanda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f5f5;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .dark-mode body {
            background-color: #121212;
            color: #fff;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
        }

        aside {
            background-color: #007BFF;
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
        }

        aside ul {
            list-style: none;
        }

        aside ul li {
            margin-bottom: 10px;
        }

        main {
            margin-left: 220px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        footer {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .dark-mode footer {
            background-color: #1f1f1f;
        }

        .toggle-dark-mode {
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <!-- Upper Menu -->
    <header>
        <div class="logo">JobLinks Rwanda</div>
        <nav>
            <ul>
                <li><a href="#">Return</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="pproject.html">Logout</a></li>
            </ul>
            <div class="toggle-dark-mode" onclick="toggleDarkMode()">🌙</div>
        </nav>
    </header>

    <!-- Left Menu -->
    <aside>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Settings</a></li>
            
            <li><a href="https://accounts.google.com/b/0/AddMailService">message</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main>
        <!-- Your Dashboard Content Goes Here -->
        <h1>Welcome to Your Employee Dashboard</h1>
        <p>Manage all operations of your application </p>
        <p>NO data found</p>
        <!-- Include the specific components for the features you need -->

    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 JobLinks Rwanda. All in Peace.</p>
    </footer>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            document.querySelector('main').classList.toggle('dark-mode');
            document.querySelector('footer').classList.toggle('dark-mode');
        }
    </script>
</body>
</html>
