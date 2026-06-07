


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'IDEAPSICOLOGIA') }} | Iniciar Sesión</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

            <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <!-- ═══════════════════════════════════════════════
         HEADER
    ═══════════════════════════════════════════════ -->
    <header class="main-header" id="mainHeader">
        <a href="{{ url('/') }}" class="logo">
            <div class="logo-icon">IP</div>
            <span class="logo-text">IDEAPSICOLOGIA</span>
        </a>

        <div class="header-actions">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-nav-login">Crear cuenta</a>
            @endif
            <a href="{{ route('login') }}" class="btn-nav-register">Iniciar sesión</a>
        </div>

        <button class="hamburger" id="hamburgerBtn" aria-label="Menú" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </header>

    <!-- Menú Mobile -->
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
        <div class="mobile-actions">
            <a href="{{ route('login') }}" class="btn-primary">Iniciar sesión</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-outline">Crear cuenta</a>
            @endif
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════
         CONTENIDO PRINCIPAL
    ═══════════════════════════════════════════════ -->
    <main class="login-wrapper">
        <div class="login-container">

            <!-- Columna Branding -->
            <aside class="login-branding">
                <div class="branding-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Plataforma certificada
                </div>
                <h2>Tu bienestar mental, <em>siempre contigo</em></h2>
                <p>Conectamos a personas con psicólogos certificados para acompañarte en cada etapa de tu vida.</p>
                <div class="branding-stats">
                    <div class="stat-item">
                        <strong>+2,400</strong>
                        <span>Pacientes activos</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <strong>98%</strong>
                        <span>Satisfacción</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <strong>+180</strong>
                        <span>Especialistas</span>
                    </div>
                </div>
                <div class="branding-testimonial">
                    <p>"Encontrar al psicólogo adecuado cambió mi vida. El proceso fue muy sencillo."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">E</div>
                        <div>
                            <strong>Elisa R.</strong>
                            <span>Paciente desde 2023</span>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Columna Formulario -->
            <section class="login-form-section">
                <div class="form-header">
                    <h1>Bienvenido de vuelta</h1>
                    <p>Ingresa tus credenciales para continuar tu proceso.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="session-status" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                    @csrf

                    <!-- Email -->
                    <div class="input-group">
                        <label for="email">{{ __('Correo electrónico') }}</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="tucorreo@ejemplo.com"
                                autocomplete="username"
                                required
                                autofocus
                                class="{{ $errors->get('email') ? 'is-invalid' : '' }}"
                                aria-invalid="{{ $errors->get('email') ? 'true' : 'false' }}"
                            >
                        </div>
                        <div id="email-errors">
                            @foreach ($errors->get('email') as $message)
                                <span class="input-error">{{ $message }}</span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="input-group">
                        <div class="label-row">
                            <label for="password">{{ __('Contraseña') }}</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Tu contraseña"
                                autocomplete="current-password"
                                required
                                class="{{ $errors->get('password') ? 'is-invalid' : '' }}"
                                aria-invalid="{{ $errors->get('password') ? 'true' : 'false' }}"
                            >
                            <button type="button" class="toggle-password" aria-label="Mostrar contraseña">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                        <div id="password-errors">
                            @foreach ($errors->get('password') as $message)
                                <span class="input-error">{{ $message }}</span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recordarme -->
                    <div class="remember-row">
                        <label class="checkbox-label" for="remember_me">
                            <input type="checkbox" id="remember_me" name="remember">
                            {{ __('Mantener sesión iniciada') }}
                        </label>
                    </div>

                    <!-- Botón submit -->
                    <button type="submit" class="btn-primary btn-full">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                        {{ __('Iniciar sesión') }}
                    </button>

                    <!-- Separador -->
                    <div class="divider"></div>

                    <!-- Registro -->
                    @if (Route::has('register'))
                        <p class="form-footer">
                            ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate gratis</a>
                        </p>
                    @endif

                </form>
            </section>
        </div>
    </main>

    <!-- ═══════════════════════════════════════════════
         SCRIPTS
    ═══════════════════════════════════════════════ -->
    <script>
        /* ── Scroll-hide header ─── */
        (function () {
            const header = document.getElementById('mainHeader');
            const mobileMenu = document.getElementById('mobileMenu');
            let lastY = 0, ticking = false;

            function onScroll() {
                const currentY = window.scrollY;
                header.classList.toggle('header-hidden', currentY > 80 && currentY > lastY);
                header.classList.toggle('scrolled', currentY > 10);
                lastY = currentY;
                ticking = false;
            }

            window.addEventListener('scroll', function () {
                if (!ticking) { requestAnimationFrame(onScroll); ticking = true; }
            }, { passive: true });
        })();

        /* ── Hamburger / menú móvil ─── */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu   = document.getElementById('mobileMenu');

        hamburgerBtn.addEventListener('click', function () {
            const isOpen = mobileMenu.classList.toggle('open');
            hamburgerBtn.classList.toggle('open');
            hamburgerBtn.setAttribute('aria-expanded', isOpen);
            mobileMenu.setAttribute('aria-hidden', !isOpen);
        });

        /* ── Toggle visibilidad contraseña ─── */
        document.querySelectorAll('.toggle-password').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const input = this.closest('.input-wrapper').querySelector('input');
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                this.setAttribute('aria-label', isHidden ? 'Ocultar contraseña' : 'Mostrar contraseña');
            });
        });

        /* ── Validación del formulario y limpieza de errores ─── */
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailErrorsContainer = document.getElementById('email-errors');
        const passwordErrorsContainer = document.getElementById('password-errors');
        const submitBtn = document.querySelector('button[type="submit"]');

        // Función para validar email
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Función para limpiar errores de un campo
        function clearFieldError(field, errorContainer) {
            field.classList.remove('is-invalid');
            field.setAttribute('aria-invalid', 'false');
            errorContainer.innerHTML = '';
        }

        // Función para mostrar errores de validación en cliente
        function showClientError(field, errorContainer, message) {
            field.classList.add('is-invalid');
            field.setAttribute('aria-invalid', 'true');
            errorContainer.innerHTML = `<span class="input-error">${message}</span>`;
        }

        // Limpiar errores al escribir
        emailInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                clearFieldError(this, emailErrorsContainer);
            }
        });

        passwordInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                clearFieldError(this, passwordErrorsContainer);
            }
        });

        // Validar antes de enviar
        loginForm.addEventListener('submit', function(e) {
            let isValid = true;

            // Validar email
            if (!emailInput.value.trim()) {
                showClientError(emailInput, emailErrorsContainer, 'El correo electrónico es requerido.');
                isValid = false;
            } else if (!isValidEmail(emailInput.value.trim())) {
                showClientError(emailInput, emailErrorsContainer, 'Por favor, ingresa un correo válido.');
                isValid = false;
            } else {
                clearFieldError(emailInput, emailErrorsContainer);
            }

            // Validar contraseña
            if (!passwordInput.value.trim()) {
                showClientError(passwordInput, passwordErrorsContainer, 'La contraseña es requerida.');
                isValid = false;
            } else if (passwordInput.value.trim().length < 1) {
                showClientError(passwordInput, passwordErrorsContainer, 'Por favor, ingresa tu contraseña.');
                isValid = false;
            } else {
                clearFieldError(passwordInput, passwordErrorsContainer);
            }

            // Prevenir envío si hay errores
            if (!isValid) {
                e.preventDefault();
                emailInput.focus();
            }

            // Desabilitar botón mientras se procesa
            if (isValid && submitBtn) {
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.7';
                submitBtn.style.cursor = 'not-allowed';
            }
        });

        // Enabilitar botón cuando el usuario empieza a editar
        loginForm.addEventListener('input', function() {
            if (submitBtn && submitBtn.disabled) {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
            }
        });
    </script>
</body>
</html>