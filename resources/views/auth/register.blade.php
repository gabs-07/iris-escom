      <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">

<body class="auth-body register-body">

    <!-- ═══════════════════════════════════════════════
         HEADER PRINCIPAL (se oculta al bajar scroll)
    ═══════════════════════════════════════════════ -->
    <header class="main-header" id="mainHeader">
        <a href="{{ url('/') }}" class="logo">
            <div class="logo-icon">IP</div>
            <span class="logo-text">IDEAPSICOLOGIA</span>
        </a>

        <div class="header-actions">
            <a href="{{ route('login') }}" class="btn-nav-login">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn-nav-register">Crear cuenta</a>
        </div>

        <button class="hamburger" id="hamburgerBtn" aria-label="Menú" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </header>

    <!-- Menú Mobile -->
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
        <div class="mobile-actions">
            <a href="{{ route('login') }}" class="btn-primary">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn-outline">Crear cuenta</a>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════
         CONTENIDO PRINCIPAL
    ═══════════════════════════════════════════════ -->
    <main class="register-wrapper">
        <div class="register-container animate-fade-up">

            <!-- ══ COLUMNA FORMULARIO ══ -->
            <section class="register-form-section">

                <div class="form-header">
                    <h1>Crea tu cuenta</h1>
                    <p>Comienza tu camino hacia el bienestar mental. Es gratis y solo toma unos minutos.</p>
                </div>

                <form class="register-form" id="registerForm" method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <!-- Sección 0: Seleccionar Rol -->
                    <fieldset class="form-section">
                        <legend>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            ¿Cuál es tu rol?
                        </legend>
                        <div class="form-grid col-1">
                            <div class="input-group">
                                <label for="rol">Tipo de cuenta <span class="required">*</span></label>
                                <select id="rol" name="rol" required onchange="cambiarFormulario(this.value)">
                                    <option value="" disabled {{ old('rol') ? '' : 'selected' }}>Seleccionar…</option>
                                    <option value="1" {{ old('rol') == '1' ? 'selected' : '' }}>Paciente</option>
                                    <option value="2" {{ old('rol') == '2' ? 'selected' : '' }}>Psicólogo</option>
                                    <option value="3" {{ old('rol') == '3' ? 'selected' : '' }}>Psiquiatra</option>
                                </select>
                                @error('rol')
                                    <span class="text-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <!-- ════════════════════════════════════════
                         FORMULARIO PACIENTE
                    ════════════════════════════════════════ -->
                    <div id="form-paciente" class="role-fields">

                        <!-- Sección 1: Datos Personales -->
                        <fieldset class="form-section">
                            <legend>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                Datos Personales
                            </legend>
                            <div class="form-grid col-2">
                                <div class="input-group">
                                    <label for="pac-nombre">Nombre(s) <span class="required">*</span></label>
                                    <input type="text" id="pac-nombre" name="nombre" placeholder="Ej. Daniela" value="{{ old('nombre') }}" required autocomplete="given-name">
                                    @error('nombre')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-apellidos">Apellidos <span class="required">*</span></label>
                                    <input type="text" id="pac-apellidos" name="apellidos" placeholder="Ej. Ponce Herrera" value="{{ old('apellidos') }}" required autocomplete="family-name">
                                    @error('apellidos')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-fecha">Fecha de nacimiento <span class="required">*</span></label>
                                    <input type="date" id="pac-fecha" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                                    @error('fecha_nacimiento')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-genero">Género <span class="required">*</span></label>
                                    <select id="pac-genero" name="genero" required>
                                        <option value="" disabled {{ old('genero') ? '' : 'selected' }}>Seleccionar…</option>
                                        <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                        <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="no-binario" {{ old('genero') == 'no-binario' ? 'selected' : '' }}>No binario</option>
                                        <option value="prefiero-no-decir" {{ old('genero') == 'prefiero-no-decir' ? 'selected' : '' }}>Prefiero no decirlo</option>
                                        <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                    @error('genero')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-tel">Teléfono celular <span class="required">*</span></label>
                                    <div class="input-with-prefix">
                                        <span class="input-prefix">+52</span>
                                        <input type="tel" id="pac-tel" name="telefono" placeholder="55 1234 5678" value="{{ old('telefono') }}" required autocomplete="tel">
                                    </div>
                                    @error('telefono')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <!-- Sección 2: Datos de Cuenta -->
                        <fieldset class="form-section">
                            <legend>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                Datos de Cuenta
                            </legend>
                            <div class="form-grid col-2">
                                <div class="input-group col-span-2">
                                    <label for="pac-email">Correo electrónico <span class="required">*</span></label>
                                    <input type="email" id="pac-email" name="email" placeholder="tucorreo@ejemplo.com" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-pass">Contraseña <span class="required">*</span></label>
                                    <div class="input-wrapper">
                                        <input type="password" id="pac-pass" name="password" placeholder="Mínimo 8 caracteres" required minlength="8" autocomplete="new-password">
                                        <button type="button" class="toggle-password" aria-label="Mostrar contraseña">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        </button>
                                    </div>
                                    <div class="password-strength" id="pac-strength"></div>
                                    @error('password')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-pass2">Confirmar contraseña <span class="required">*</span></label>
                                    <div class="input-wrapper">
                                        <input type="password" id="pac-pass2" name="password_confirmation" placeholder="Repite tu contraseña" required autocomplete="new-password">
                                        <button type="button" class="toggle-password" aria-label="Mostrar contraseña">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <!-- Sección 3: Contacto de Emergencia -->
                        <fieldset class="form-section">
                            <legend>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.72a16 16 0 0 0 6 6l.94-1.94a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                Contacto de Emergencia
                            </legend>
                            <p class="section-desc">Solo será contactado ante una situación de riesgo. Es un requisito de cuidado profesional.</p>
                            <div class="form-grid col-2">
                                <div class="input-group">
                                    <label for="pac-ec-nombre">Nombre completo <span class="required">*</span></label>
                                    <input type="text" id="pac-ec-nombre" name="emergencia_nombre" placeholder="Nombre del contacto" value="{{ old('emergencia_nombre') }}" required>
                                    @error('emergencia_nombre')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="pac-ec-relacion">Relación / Parentesco <span class="required">*</span></label>
                                    <select id="pac-ec-relacion" name="emergencia_relacion" required>
                                        <option value="" disabled {{ old('emergencia_relacion') ? '' : 'selected' }}>Seleccionar…</option>
                                        <option value="padre-madre" {{ old('emergencia_relacion') == 'padre-madre' ? 'selected' : '' }}>Padre / Madre</option>
                                        <option value="hermano-hermana" {{ old('emergencia_relacion') == 'hermano-hermana' ? 'selected' : '' }}>Hermano/a</option>
                                        <option value="conyuge" {{ old('emergencia_relacion') == 'conyuge' ? 'selected' : '' }}>Cónyuge / Pareja</option>
                                        <option value="hijo-hija" {{ old('emergencia_relacion') == 'hijo-hija' ? 'selected' : '' }}>Hijo/a</option>
                                        <option value="amigo" {{ old('emergencia_relacion') == 'amigo' ? 'selected' : '' }}>Amigo/a de confianza</option>
                                        <option value="otro" {{ old('emergencia_relacion') == 'otro' ? 'selected' : '' }}>Otro familiar</option>
                                    </select>
                                    @error('emergencia_relacion')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group col-span-2">
                                    <label for="pac-ec-tel">Teléfono del contacto <span class="required">*</span></label>
                                    <div class="input-with-prefix">
                                        <span class="input-prefix">+52</span>
                                        <input type="tel" id="pac-ec-tel" name="emergencia_telefono" placeholder="55 1234 5678" value="{{ old('emergencia_telefono') }}" required>
                                    </div>
                                    @error('emergencia_telefono')
                                        <span class="text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <!-- Términos -->
                        <div class="terms-section">
                            <label class="checkbox-label">
                                <input type="checkbox" name="terminos" {{ old('terminos') ? 'checked' : '' }} required>
                                <span class="checkmark"></span>
                                Acepto los <a href="#">Términos de Servicio</a> y el <a href="#">Aviso de Privacidad</a> <span class="required">*</span>
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="comunicaciones" {{ old('comunicaciones') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                Deseo recibir recursos de bienestar mental y comunicaciones de IDEAPSICOLOGIA
                            </label>
                            @error('terminos')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary btn-full btn-lg">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Crear mi cuenta de paciente
                        </button>
                    </div>

                </form>

                <p class="form-footer">
                    ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
                </p>

            </section>

            <!-- ══ COLUMNA BRANDING ══ -->
            <aside class="register-branding">
                <div class="branding-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Plataforma certificada
                </div>
                <h2>Tu bienestar<br><em>comienza aquí</em></h2>
                <p>Únete a miles de personas que encontraron el apoyo que necesitaban.</p>

                <div class="branding-features" id="brandingFeatures">
                    <!-- Features Paciente (default) -->
                    <div class="feature-set" id="features-paciente">
                        <div class="feature-item">
                            <div class="feature-icon">🔒</div>
                            <div>
                                <strong>Privacidad garantizada</strong>
                                <span>Tus datos son confidenciales bajo la NOM-024-SSA3-2012</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🎯</div>
                            <div>
                                <strong>Matching inteligente</strong>
                                <span>Te conectamos con el psicólogo ideal para tu situación</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📅</div>
                            <div>
                                <strong>Agenda flexible</strong>
                                <span>Citas disponibles de 7am a 10pm, incluyendo fines de semana</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">💬</div>
                            <div>
                                <strong>Soporte continuo</strong>
                                <span>Chat de seguimiento entre sesiones incluido</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="branding-testimonial" id="brandingTestimonial">
                    <div id="testimonial-paciente">
                        <p>"En dos semanas encontré a mi terapeuta ideal. El proceso de registro fue muy sencillo."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">G</div>
                            <div>
                                <strong>Gabriela N.</strong>
                                <span>Paciente, 28 años</span>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </main>



    <!-- ═══════════════════════════════════════════════
         SCRIPTS
    ═══════════════════════════════════════════════ -->
    <script>
        /* ── Cambiar formulario según rol ────────────────── */
        function cambiarFormulario(rol) {
            const formPaciente = document.getElementById('form-paciente');
            // Por ahora solo mostramos el formulario de paciente para todos
            // En el futuro se pueden agregar formularios específicos para psicólogos y psiquiatras
            if (rol) {
                formPaciente.style.display = 'block';
            } else {
                formPaciente.style.display = 'none';
            }
        }

        // Inicializar el formulario según el rol guardado
        const rolSelect = document.getElementById('rol');
        if (rolSelect && rolSelect.value) {
            cambiarFormulario(rolSelect.value);
        }

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

        /* ── Toggle contraseña ──────────────────────────── */
        document.querySelectorAll('.toggle-password').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const input = this.closest('.input-wrapper').querySelector('input');
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                this.setAttribute('aria-label', isHidden ? 'Ocultar contraseña' : 'Mostrar contraseña');
            });
        });

        /* ── Fuerza de contraseña ───────────────────────── */
        function checkStrength(input, barId) {
            const bar = document.getElementById(barId);
            if (!bar) return;
            const val = input.value;
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;
            bar.className = 'password-strength';
            bar.innerHTML = '';
            if (val.length === 0) return;
            const labels = ['Muy débil', 'Débil', 'Regular', 'Fuerte'];
            const classes = ['strength-1', 'strength-2', 'strength-3', 'strength-4'];
            bar.classList.add(classes[score - 1] || 'strength-1');
            bar.textContent = labels[score - 1] || labels[0];
        }

        const pacPass = document.getElementById('pac-pass');
        if (pacPass) pacPass.addEventListener('input', () => checkStrength(pacPass, 'pac-strength'));
    </script>
</body>