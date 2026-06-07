
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email - IDEAPSICOLOGIA</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
    <style>
        .verify-body {
            background: var(--bg-main);
        }

        .verify-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 5%;
            min-height: 100vh;
        }

        .verify-container {
            background: #fff;
            width: 100%;
            max-width: 500px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 3rem 2.5rem;
            text-align: center;
        }

        .verify-icon {
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

        .verify-icon svg {
            width: 48px;
            height: 48px;
        }

        .verify-container h1 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 700;
        }

        .verify-container > p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .verify-message {
            background: rgba(61, 155, 122, 0.08);
            border: 1.5px solid rgba(61, 155, 122, 0.2);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .verify-message.success {
            background: rgba(76, 175, 80, 0.08);
            border-color: rgba(76, 175, 80, 0.2);
            color: #388e3c;
        }

        .verify-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .verify-actions form {
            width: 100%;
        }

        .btn-verify {
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
        }

        .btn-verify-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-verify-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(61, 155, 122, 0.3);
        }

        .btn-verify-primary:active {
            transform: translateY(0);
        }

        .btn-verify-secondary {
            background: transparent;
            color: var(--text-muted);
            border: 1.5px solid var(--border);
        }

        .btn-verify-secondary:hover {
            background: var(--bg-main);
            color: var(--text-dark);
            border-color: var(--text-muted);
        }

        .btn-verify-secondary:active {
            background: rgba(0, 0, 0, 0.02);
        }

        .verify-footer {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .verify-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .verify-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .verify-container {
                padding: 2rem 1.5rem;
            }

            .verify-container h1 {
                font-size: 1.4rem;
            }

            .verify-icon {
                width: 70px;
                height: 70px;
            }

            .verify-icon svg {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body class="verify-body">

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
    <main class="verify-wrapper">
        <div class="verify-container">
            <!-- Ícono -->
            <div class="verify-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 11l3 3L22 4"/>
                    <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <h1>Verifica tu email</h1>
            <p>Gracias por registrarte. Para continuar, verifica tu correo electrónico.</p>

            <!-- Mensaje de estado -->
            @if (session('status') == 'verification-link-sent')
                <div class="verify-message success">
                    ✓ Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </div>
            @else
                <div class="verify-message">
                    Hemos enviado un enlace de verificación a tu correo electrónico. Si no lo ves, revisa tu carpeta de spam o solicita otro enlace.
                </div>
            @endif

            <!-- Acciones -->
            <div class="verify-actions">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn-verify btn-verify-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                        Reenviar email de verificación
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-verify btn-verify-secondary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l4-4m0 0l-4-4m4 4H9"/>
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>

            <!-- Pie de página -->
            <div class="verify-footer">
                ¿Ya verificaste tu email? <a href="{{ route('dashboard') }}">Ir al dashboard</a>
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
