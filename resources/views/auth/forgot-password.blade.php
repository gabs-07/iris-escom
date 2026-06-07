
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - IDEAPSICOLOGIA</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
    <style>
        .forgot-body {
            background: var(--bg-main);
        }

        .forgot-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 5%;
            min-height: 100vh;
        }

        .forgot-container {
            background: #fff;
            width: 100%;
            max-width: 500px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 3rem 2.5rem;
            text-align: center;
        }

        .forgot-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(61, 155, 122, 0.1);
            border-radius: var(--radius-full);
            color: var(--primary);
        }

        .forgot-icon svg {
            width: 48px;
            height: 48px;
        }

        .forgot-container h1 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 700;
        }

        .forgot-container > p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .forgot-form {
            text-align: left;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            font-family: var(--font-body);
            transition: var(--transition);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(61, 155, 122, 0.1);
        }

        .form-error {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        .btn-forgot {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            font-family: var(--font-body);
            background: var(--primary);
            color: #fff;
        }

        .btn-forgot:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(61, 155, 122, 0.3);
        }

        .btn-forgot:active {
            transform: translateY(0);
        }

        .forgot-footer {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .forgot-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-footer a:hover {
            text-decoration: underline;
        }

        .status-message {
            background: rgba(76, 175, 80, 0.08);
            border: 1.5px solid rgba(76, 175, 80, 0.2);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #388e3c;
            font-size: 0.9rem;
            font-weight: 500;
        }

        @media (max-width: 640px) {
            .forgot-container {
                padding: 2rem 1.5rem;
            }

            .forgot-container h1 {
                font-size: 1.4rem;
            }

            .forgot-icon {
                width: 70px;
                height: 70px;
            }

            .forgot-icon svg {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body class="forgot-body">

    <!-- ═══════════════════════════════════════════════
         HEADER PRINCIPAL
    ═══════════════════════════════════════════════ -->
    <header class="main-header" id="mainHeader">
        <a href="{{ url('/') }}" class="logo">
            <div class="logo-icon">IP</div>
            <span class="logo-text">IDEAPSICOLOGIA</span>
        </a>

        <div class="header-actions">
            <a href="{{ route('login') }}" class="btn-nav-login">Iniciar sesión</a>
        </div>

        <button class="hamburger" id="hamburgerBtn" aria-label="Menú" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </header>

    <!-- Menú Mobile -->
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
        <div class="mobile-actions">
            <a href="{{ route('login') }}" class="btn-primary">Iniciar sesión</a>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════
         CONTENIDO PRINCIPAL
    ═══════════════════════════════════════════════ -->
    <main class="forgot-wrapper">
        <div class="forgot-container">
            <!-- Ícono -->
            <div class="forgot-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 6v6l4 2"/>
                </svg>
            </div>

            <h1>Recupera tu contraseña</h1>
            <p>¿Olvidaste tu contraseña? Sin problema. Solo indícanos tu correo electrónico y te enviaremos un enlace para que puedas establecer una nueva contraseña.</p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    ✓ {{ session('status') }}
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}" class="forgot-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                    <input 
                        id="email" 
                        class="form-input" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        placeholder="tu@email.com"
                    />
                    @if ($errors->has('email'))
                        <div class="form-error">
                            @foreach ($errors->get('email') as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn-forgot">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    Enviar enlace de recuperación
                </button>
            </form>

            <!-- Pie de página -->
            <div class="forgot-footer">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </main>

    <!-- ═══════════════════════════════════════════════
         SCRIPTS
    ═══════════════════════════════════════════════ -->
    <script>
        /* ── Hamburger ──────────────────────────────────── */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenuEl = document.getElementById('mobileMenu');

        function closeMobileMenu() {
            hamburgerBtn.classList.remove('open');
            mobileMenuEl.classList.remove('open');
            hamburgerBtn.setAttribute('aria-expanded', 'false');
            mobileMenuEl.setAttribute('aria-hidden', 'true');
        }

        hamburgerBtn.addEventListener('click', function () {
            const isOpen = mobileMenuEl.classList.toggle('open');
            hamburgerBtn.classList.toggle('open');
            hamburgerBtn.setAttribute('aria-expanded', isOpen);
            mobileMenuEl.setAttribute('aria-hidden', !isOpen);
        });

        /* ── Scroll-hide header ─────────────────────────── */
        (function () {
            const header = document.getElementById('mainHeader');
            const mobileMenuEl = document.getElementById('mobileMenu');
            let lastY = 0;
            let ticking = false;

            function onScroll() {
                const currentY = window.scrollY;
                const isScrollingDown = currentY > lastY;
                const isPastThreshold = currentY > 80;

                if (isPastThreshold && isScrollingDown) {
                    header.classList.add('header-hidden');
                    if (mobileMenuEl.classList.contains('open')) closeMobileMenu();
                } else {
                    header.classList.remove('header-hidden');
                }

                header.classList.toggle('scrolled', currentY > 10);
                lastY = currentY;
                ticking = false;
            }

            window.addEventListener('scroll', function () {
                if (!ticking) { requestAnimationFrame(onScroll); ticking = true; }
            }, { passive: true });
        })();
    </script>
</body>
</html>
