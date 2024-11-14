<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/lib.css') }}">
    <title>Feed</title>
</head>
<body>
    <header class="site-header">
            <nav class="nav">
                <h1>Book Review</h1>
                <b>
                    <ul class="nav-list">
                        <li class="nav-item"><a href="/">Home</a></li>
                        <li class="nav-item"><a href="/lib">My Library</a></li>
                    </ul>
                </b>
            </nav>
    </header>

    <div class="main-section">
        <p>Welcome, {{ $userId }}</p>
        <h1>This is the library section.</h1>
    </div>
</body>
</html>