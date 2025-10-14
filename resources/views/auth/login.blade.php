<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f39513;
            --primary-dark: #e0850a;
            --secondary: #f8f7fc;
            --dark: #333;
            --light: #fff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(270deg, #f39513, #f8f7fc, #ffd89b, #f39513);
            background-size: 800% 800%;
            animation: gradientBG 15s ease infinite;
            z-index: -1;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            animation: floatParticle 15s infinite linear;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Auth Wrapper */
        .auth-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Left Panel */
        .auth-info {
            position: relative;
            background: linear-gradient(135deg, rgba(243, 149, 19, 0.9), rgba(248, 247, 252, 0.9));
            background-size: 300% 300%;
            animation: gradientShift 8s ease infinite;
            color: var(--dark);
            border-radius: 1.5rem 0 0 1.5rem;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            box-shadow: var(--shadow);
            backdrop-filter: blur(5px);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .brand-logo {
            margin-bottom: 2rem;
            animation: fadeInDown 1s ease both;
        }

        .brand-logo img {
            max-width: 180px;
            filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.1));
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .auth-media img {
            animation: floatUp 4s ease-in-out infinite;
            max-width: 85%;
            margin-top: 20px;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
        }

        @keyframes floatUp {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        .info-text {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 450px;
            margin: 1.5rem auto 0 auto;
            line-height: 1.6;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 2rem;
        }

        .feature {
            background: rgba(255, 255, 255, 0.7);
            padding: 10px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            backdrop-filter: blur(5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            animation: fadeIn 1s ease both;
            animation-delay: 0.5s;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Right Panel (Login Form) */
        .auth-form {
            position: relative;
            animation: fadeInUp 1s ease forwards;
            background: rgba(190, 112, 33, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .auth-form h3 {
            font-weight: 700;
            color: #f39513;
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
        }

        .auth-form h3:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #f39513;
            border-radius: 3px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            margin-bottom: 1.2rem;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: #f39513;
            box-shadow: 0 0 0 0.2rem rgba(243, 149, 19, 0.25);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        /* Floating shapes behind form */
        .floating-shapes span {
            position: absolute;
            border-radius: 50%;
            background: rgba(243, 149, 19, 0.2);
            animation: float 6s ease-in-out infinite;
            z-index: -1;
        }

        .floating-shapes span:nth-child(1) {
            width: 80px; height: 80px; top: -20px; left: 10%;
            animation-delay: 0s;
        }
        .floating-shapes span:nth-child(2) {
            width: 50px; height: 50px; bottom: 20px; right: 15%;
            animation-delay: 2s;
        }
        .floating-shapes span:nth-child(3) {
            width: 60px; height: 60px; top: 30%; right: 30%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%,100% {transform: translateY(0) rotate(0deg);}
            50% {transform: translateY(-20px) rotate(180deg);}
        }

        /* Buttons */
        button.btn-primary {
            background-color: #f39513;
            border-color: #f39513;
            color: #fff;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        button.btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(243, 149, 19, 0.4);
        }

        button.btn-primary:active {
            transform: translateY(-1px);
        }

        button.btn-primary:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        button.btn-primary:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        .additional-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .form-check-input:checked {
            background-color: #f39513;
            border-color: #f39513;
        }

        .form-check-label {
            color: #fff;
        }

        .forgot-password {
            color: #f39513;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }

        .divider:before, .divider:after {
            content: "";
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .divider span {
            padding: 0 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #555;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .social-btn.google:hover {
            color: #DB4437;
            border-color: #DB4437;
        }

        .social-btn.facebook:hover {
            color: #4267B2;
            border-color: #4267B2;
        }

        .social-btn.twitter:hover {
            color: #1DA1F2;
            border-color: #1DA1F2;
        }

        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .signup-link a {
            color: #f39513;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .signup-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .auth-info {
                border-radius: 1.5rem 1.5rem 0 0;
                padding: 2rem 1rem;
            }
            .auth-form {
                margin-top: 1rem;
                border-radius: 0 0 1.5rem 1.5rem;
            }
            .features {
                gap: 10px;
            }
            .feature {
                font-size: 0.8rem;
                padding: 8px 12px;
            }
        }

        @media (max-width: 576px) {
            .auth-wrapper {
                padding: 10px;
            }
            .auth-form {
                padding: 1.5rem;
            }
            .additional-options {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    
    <!-- Floating particles -->
    <div class="particles" id="particles"></div>
    
    <div class="auth-wrapper container-fluid">
        <div class="row align-items-center w-100">
            <!-- Left Panel -->
            <div class="col-xl-6 col-lg-6 col-md-12 text-center p-0">
                <div class="auth-info h-100 d-flex flex-column justify-content-center">
                    <div class="brand-logo">
                        <img src="{{ url('assets/images/learning_logo.svg') }}" alt="CRM Logo">
                    </div>
                    {{-- <p class="info-text">
                         Welcome In CRM

                    </p> --}}
                    <div class="auth-media">
                        <img src="{{ url('assets/images/login.png') }}" alt="Login Illustration" class="img-fluid mx-auto">
                    </div>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-chart-line me-2"></i> Analytics Dashboard
                        </div>
                        <div class="feature">
                            <i class="fas fa-users me-2"></i> Customer Management
                        </div>
                        <div class="feature">
                            <i class="fas fa-bell me-2"></i> Smart Notifications
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="col-xl-6 col-lg-6 col-md-12 p-5 d-flex justify-content-center">
                <div class="auth-form mx-auto" style="max-width: 420px;">
                    <!-- Floating shapes -->
                    <div class="floating-shapes">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    
                    <h3>Welcome Back</h3>
                    <p class="text-center mb-4" style="color: rgba(255,255,255,0.8)">Sign in to your account to continue</p>
                    
                    <!-- Login Form - Keeping your original structure -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="additional-options">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </form>
                    
                    {{-- <div class="divider">
                        <span>Or continue with</span>
                    </div>
                    
                    <div class="social-login">
                        <a href="#" class="social-btn google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-btn twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div> --}}
                    
                    <div class="signup-link">
                        Don't have an account? <a href="{{ route('register') }}">Sign up now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Create floating particles
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 20 + 5;
                const posX = Math.random() * 100;
                const delay = Math.random() * 15;
                const duration = Math.random() * 10 + 15;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                
                particlesContainer.appendChild(particle);
            }
            
            // Button ripple effect
            const buttons = document.querySelectorAll('button.btn-primary');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const x = e.clientX - e.target.getBoundingClientRect().left;
                    const y = e.clientY - e.target.getBoundingClientRect().top;
                    
                    const ripple = document.createElement('span');
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
</html>