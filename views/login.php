<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APITZ BARBERSHOP SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
            background-color: #121212;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: -10px;
            left: -10px;
            width: calc(100% + 20px);
            height: calc(100% + 20px);
            background-image: url('../images/back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(5px);
            z-index: -1;
        }
        
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-box {
            background-color: rgba(30, 30, 30, 0.9);
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            width: 32%;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .logo img {
            width: 120px;
            height: auto;
            margin-bottom: 1.5rem;
        }
        
        .login-title {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-align: center;
            letter-spacing: 0.5px;
        }
        
        .login-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 300;
        }
        
        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            padding: 0.85rem 1rem;
            margin-bottom: 1.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.3);
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.05);
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
        
        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            font-weight: 400;
            display: block;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            color: #ffffff;
            border: none;
            padding: 0.9rem;
            width: 100%;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            margin-top: 1rem;
        }
        
        .btn-submit:hover {
            background: linear-gradient(135deg, #5d3a99 0%, #8c40ab 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .show-password {
            display: flex;
            align-items: center;
            margin-top: 0.5rem;
            font-size: 0.85rem;
        }
        
        .show-password input {
            margin-right: 0.5rem;
        }
        
        @media (max-width: 576px) {
            .login-box {
                padding: 2rem 1.5rem;
                margin: 0 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Login Form -->
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <img src="../images/apitzlogo.png" alt="Apitz's Barbershop Logo">
                <h1 class="login-title">Welcome Back</h1>
                <p class="login-subtitle">Sign in to your staff account to continue</p>
            </div> 
            
            <form action="../controller/login_exec.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                </div>
                
                <div class="show-password">
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword">Show Password</label>
                </div>
                
                <button type="submit" class="btn btn-submit">Sign In</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        const password = document.querySelector('#password');
        const showPasswordCheckbox = document.querySelector('#showPassword');
        
        showPasswordCheckbox.addEventListener('change', function() {
            if(this.checked) {
                password.setAttribute('type', 'text');
            } else {
                password.setAttribute('type', 'password');
            }
        });
    </script>
</body>
</html>