<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LitScope-Login</title>
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <nav>
        <a href="#"><img src="{{ asset('assets\css\logo.png') }}" alt="logo"></a>
    </nav>
    <div class="form-wrapper">
        <div class="form-container">
            <!-- Login Form -->
            <div class="form login-form">
                <h2>Sign In</h2>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="form-control">
                        <input type="text" name="username" required placeholder=" ">
                        <label>Username</label>
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" class="password" required placeholder=" ">
                        <label for="password">Password</label>
                        <i class="fa-solid fa-eye toggle-password" data-target="password"></i>
                    </div>
                    <button type="submit">Sign In</button>
                    <div class="form-help"> 
                        <div class="remember-me">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Remember me</label>
                        </div>
                        <a href="#">Need help?</a>
                    </div>
                </form>
                <div class="new">
                    <p>New to LitScope? <a href="#" id="show-signup">Sign up now</a></p>
                </div>
            </div>

            <!-- Sign-Up Form -->
            <div class="form signup-form">
                <h2>Sign Up</h2>
                <form action="{{ route('signup.submit') }}" method="POST">
                    @csrf
                    <div class="form-control">
                        <input type="text" name="username" required placeholder=" ">
                        <label>Username</label>
                    </div>
                    <div class="form-control">
                        <input type="date" name="birthday" required placeholder=" ">
                        <label>Birthday</label>
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" class="password" required placeholder=" ">
                        <label for="password">Password</label>
                        <i class="fa-solid fa-eye toggle-password" data-target="password"></i>
                    </div>

                    <button type="submit">Sign Up</button>
                </form>
                <p>Already have an account? <a href="#" id="show-login">Sign in</a></p>
            </div>
        </div>
    </div>

    <script>
        const formWrapper = document.querySelector('.form-wrapper');
        document.getElementById('show-signup').addEventListener('click', (e) => {
            e.preventDefault();
            formWrapper.classList.add('flip');
        });
        document.getElementById('show-login').addEventListener('click', (e) => {
            e.preventDefault();
            formWrapper.classList.remove('flip');
        });

        function pass(target) {
            const passwordInput = target.closest('.form-control').querySelector('.password');
            const eyeIcon = target.closest('.form-control').querySelector('.toggle-password');
            
            // Toggle password visibility
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; 
                eyeIcon.classList.remove("fa-eye"); 
                eyeIcon.classList.add("fa-eye-slash"); 
            } else {
                passwordInput.type = "password"; 
                eyeIcon.classList.remove("fa-eye-slash"); 
                eyeIcon.classList.add("fa-eye"); 
            }
        }

        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function() {
                pass(this);
            });
        });


    </script>
</body>
</html>

