<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Page</title>
</head>
<body>
    <div class="min-h-screen bg-gray-700 flex flex-col text-white">
        <header class="bg-gray-800 text-white py-2 flex flex-row justify-between px-5">
            <h1>Project X</h1>
            <nav>
                <ul class="flex flex-row justify-around gap-5">
                    <li><a class='nav-link' href="/students">Students</a></li>
                    <li><a class='nav-link' href="/courses">Courses</a></li>
                    <li><a class='nav-link' href="/departments">Departments</a></li>
                    <li><a class='nav-link' href="/instructors">Instructors</a></li>
                </ul>
            </nav>
        </header>
        <main class="flex-1 p-4">
            {{ $slot }}
        </main>
        <footer class="bg-gray-800 text-white py-2 p-5">
            <p>&copy; <span id="year"></span> Project X. All rights reserved.</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const yearElement = document.getElementById('year');
            if (yearElement) {
                yearElement.textContent = new Date().getFullYear().toLocaleString().replace(',', '');
            }
        });
    </script>
</body>
</html>