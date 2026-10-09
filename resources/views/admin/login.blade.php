<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link rel="icon" type="image/png"
          href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/main.css') }}">
</head>

<body>

<div class="login-wrapper">

    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <div class="login-card">

        <!-- Brand -->
        <a href="{{ url('/') }}" class="login-brand text-decoration-none">
            <i class="bi bi-asterisk"></i>
            <span>ADMIN LOGIN</span>
        </a>

        <p class="login-subtitle">
            Please sign in to access the admin dashboard
        </p>

        <!-- Error -->
        @if(session('error'))
            <p style="color:red;">
                {{ session('error') }}
            </p>
        @endif

        <!-- Admin Login Form -->
        <form method="POST"
              action="{{ route('admin.login.submit') }}"
              id="loginForm">

            @csrf

            <!-- Email -->
            <div class="login-form-group">

                <label for="email" class="login-form-label">
                    Email Address
                </label>

                <div class="login-input-group">

                    <i class="bi bi-envelope input-icon"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="login-input"
                        placeholder="admin@example.com"
                        required
                        autofocus
                    >

                </div>
            </div>


            <!-- Password -->
            <div class="login-form-group">

                <label for="password" class="login-form-label">
                    Password
                </label>

                <div class="login-input-group">

                    <i class="bi bi-shield-lock input-icon"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="login-input login-input-password"
                        placeholder="••••••••"
                        required
                    >

                    <button type="button"
                            class="password-toggle-btn"
                            id="toggle-password"
                            aria-label="Show password">

                        <i class="bi bi-eye"></i>

                    </button>

                </div>
            </div>


            <!-- Login Button -->
            <button type="submit"
                    class="btn-login"
                    id="btn-submit">

                <span>Sign In to Dashboard</span>

                <i class="bi bi-arrow-right"></i>

            </button>

        </form>

    </div>

</div>


<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/auth.js') }}"></script>

</body>
</html>