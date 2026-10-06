<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Laundry Azzam</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="login-wrapper">

        <!-- BAGIAN KIRI -->
        <div class="login-left">

            <div class="left-content">

                <h1>
                    Bersih, Wangi,<br>
                    Cepat & Terpercaya
                </h1>

                <p>
                    Layanan laundry terbaik untuk<br>
                    pakaian bersih dan harum setiap hari.
                </p>

            </div>

            <img
                src="{{ asset('images/laundry-login.jpeg') }}"
                alt="Laundry"
                class="laundry-image"
            >

        </div>


        <!-- BAGIAN KANAN -->
        <div class="login-right">

            <div class="login-form">

                <!-- LOGO -->
                <div class="logo">
                    <img
                        src="{{ asset('images/logo-laundry.png') }}"
                        alt="Laundry Azzam"
                    >
                </div>

                <h2>Welcome Back!</h2>

                <p class="login-subtitle">
                    Please login to continue
                </p>

                @if($errors->any())
                <div>
                    {{ $errors->first() }}
                    </div>
            @endif
                <!-- FORM -->
                <form action="{{ route('login.process') }}" method="POST">

                    @csrf

                    <!-- USERNAME -->
                    <div class="form-group">

                        <label for="username">
                            Username
                        </label>

                        <div class="input-box">

                            <input
                                type="text"
                                id="username"
                                name="username"
                                placeholder="Enter your username"
                                required
                            >

                            <span class="input-icon">
                                
                            </span>

                        </div>

                    </div>


                    <!-- PASSWORD -->
                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-box">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                required
                            >

                            <span class="input-icon">
                                
                            </span>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="login-button"
                    >
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>
<script>
    
    for (let i = 0; i < 10; i++) {
        history.pushState({ dashboard: true }, '', location.href);
    }

    window.addEventListener('popstate', function () {
        history.pushState({ dashboard: true }, '', location.href);
    });
</script>

</body>

</html>