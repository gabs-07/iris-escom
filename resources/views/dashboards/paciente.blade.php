        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/auxilio.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
        
    {{-- Estilos embebidos --}}
    <style>
        /* ── Variables ─────────────────────────────────────────── */
        :root {
            --clr-bg:       #f4f6f9;
            --clr-surface:  #ffffff;
            --clr-primary:  #4a7c6f;
            --clr-primary-light: #e8f1ef;
            --clr-accent:   #6db89a;
            --clr-text:     #1e2d2a;
            --clr-muted:    #6b7c78;
            --clr-border:   #dde4e2;
            --clr-amber:    #d97706;
            --clr-amber-bg: #fffbeb;
            --clr-amber-border: #fde68a;
            --radius:       14px;
            --shadow-sm:    0 1px 4px rgba(0,0,0,.07);
            --shadow-md:    0 4px 18px rgba(0,0,0,.10);
            --font-head:    'Georgia', 'Times New Roman', serif;
            --font-body:    'Segoe UI', system-ui, sans-serif;
        }

        /* ── Layout base ───────────────────────────────────────── */
        .dashboard-body { background: var(--clr-bg); font-family: var(--font-body); }

        /* ── Header bar ────────────────────────────────────────── */
        .dashboard-header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .welcome-text h1 {
            font-family: var(--font-head);
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--clr-text);
            margin: 0;
        }
        .welcome-text p {
            font-size: .85rem;
            color: var(--clr-muted);
            margin: .15rem 0 0;
        }
        .header-actions { display: flex; align-items: center; gap: .75rem; }

        .notification-chip {
            position: relative;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 50%;
            width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: background .18s, box-shadow .18s;
        }
        .notification-chip:hover { background: var(--clr-primary-light); box-shadow: var(--shadow-sm); }
        .notification-chip svg { width: 18px; height: 18px; color: var(--clr-primary); }
        .notif-badge {
            position: absolute;
            top: 4px; right: 4px;
            background: #ef4444;
            color: #fff;
            font-size: .6rem;
            font-weight: 700;
            border-radius: 99px;
            min-width: 16px; height: 16px;
            display: flex; align-items: center; justify-content: center;
            padding: 0 3px;
        }
        .profile-chip {
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-accent));
            border-radius: 50%;
            width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            border: none;
            cursor: pointer;
            transition: transform .18s;
        }
        .profile-chip:hover { transform: scale(1.05); }
        .avatar { color: #fff; font-weight: 700; font-size: 1rem; }

        /* ── Profile Dropdown ──────────────────────────────────── */
        .profile-dropdown {
            position: relative;
        }
        .profile-menu {
            position: absolute;
            top: 50px;
            right: 0;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,.15);
            width: 260px;
            padding: 0;
            display: none;
            z-index: 1000;
            animation: slideDown .18s ease-out;
        }
        .profile-menu.active {
            display: block;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Profile Menu Items ────────────────────────────────── */
        .profile-menu-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            border-bottom: 1px solid var(--clr-border);
        }
        .profile-menu-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-accent));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }
        .profile-menu-info {
            flex: 1;
            min-width: 0;
        }
        .profile-menu-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--clr-text);
            margin: 0;
            word-break: break-word;
        }
        .profile-menu-email {
            font-size: 0.75rem;
            color: var(--clr-muted);
            margin: 0.2rem 0 0;
            word-break: break-word;
        }
        .profile-menu-divider {
            height: 1px;
            background: var(--clr-border);
            margin: 0;
        }
        .profile-menu-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border: none;
            background: none;
            color: var(--clr-text);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            text-align: left;
            transition: background 0.18s, color 0.18s;
        }
        .profile-menu-item:hover {
            background: var(--clr-primary-light);
            color: var(--clr-primary);
        }
        .profile-menu-item svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }
        .profile-menu-logout:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        /* ── Nav pills (reemplaza los botones del header original) */
        .nav-pills {
            display: flex;
            flex-wrap: nowrap;
            gap: 0.5rem;
            align-items: center;
        }
        .nav-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 99px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            border: 1.5px solid transparent;
            transition: background 0.18s, color 0.18s, border-color 0.18s;
            white-space: nowrap;
        }
        .nav-pill svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }
        .nav-pill--indigo  { background: #eef2ff; color: #4338ca; border-color: #c7d2fe; }
        .nav-pill--indigo:hover  { background: #4338ca; color: #fff; }
        .nav-pill--emerald { background: #ecfdf5; color: #065f46; border-color: #a7f3d0; }
        .nav-pill--emerald:hover { background: #059669; color: #fff; }
        .nav-pill--sky     { background: #e0f2fe; color: #0369a1; border-color: #bae6fd; }
        .nav-pill--sky:hover     { background: #0284c7; color: #fff; }
        .nav-pill--fuchsia { background: #fdf4ff; color: #86198f; border-color: #e9d5ff; }
        .nav-pill--fuchsia:hover { background: #a21caf; color: #fff; }

        /* ── Wrapper principal ─────────────────────────────────── */
        .dash-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem 4rem;
        }

        /* ── Cards ─────────────────────────────────────────────── */
        .dash-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            padding: 1.5rem;
            transition: box-shadow .2s;
        }
        .dash-card:hover { box-shadow: var(--shadow-md); }

        /* ── Diary card ────────────────────────────────────────── */
        .diary-card { margin-bottom: 1.5rem; }
        .diary-card h2 {
            font-family: var(--font-head);
            font-size: 1.15rem;
            color: var(--clr-text);
            margin: 0 0 .25rem;
        }
        .card-subtitle { font-size: .85rem; color: var(--clr-muted); margin: 0 0 1.25rem; }
        .diary-label { display: block; font-size: .82rem; font-weight: 600; color: var(--clr-text); margin-bottom: .5rem; }
        .diary-textarea {
            width: 100%;
            min-height: 110px;
            border: 1.5px solid var(--clr-border);
            border-radius: 10px;
            padding: .85rem 1rem;
            font-family: var(--font-body);
            font-size: .9rem;
            color: #1e2d2a !important;
            resize: vertical;
            background: #ffffff !important;
            transition: border-color .18s;
            box-sizing: border-box;
        }
        .diary-textarea:focus { outline: none; border-color: var(--clr-accent); background: #fff; }
        .emoji-selector { margin: 1.1rem 0 .9rem; }
        .emoji-selector-title { font-size: .8rem; font-weight: 600; color: var(--clr-muted); display: block; margin-bottom: .5rem; }
        .emoji-options { display: flex; flex-wrap: wrap; gap: .5rem; }
        .emoji-option input { display: none; }
        .emoji-option span {
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 8px;
            padding: .2rem .35rem;
            border: 2px solid transparent;
            transition: border-color .15s, transform .15s;
            display: inline-block;
        }
        .emoji-option input:checked + span { border-color: var(--clr-accent); background: var(--clr-primary-light); transform: scale(1.15); }
        .emoji-option span:hover { transform: scale(1.1); }
        .diary-actions { display: flex; align-items: center; gap: 1rem; margin-top: .75rem; flex-wrap: wrap; }
        .btn-primary-small {
            background: var(--clr-primary);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: .55rem 1.3rem;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .18s;
        }
        .btn-primary-small:hover { background: #3a6358; }
        .diary-helper { font-size: .78rem; color: var(--clr-muted); }
        .diary-status { font-size: .82rem; color: var(--clr-primary); min-height: 1.2em; margin-top: .5rem; }

        /* ── Stats grid ────────────────────────────────────────── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }
        .stat-card {
            border-radius: var(--radius);
            border: 1px solid var(--clr-border);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .stat-card--sky    { background: linear-gradient(135deg, #f0f9ff, #e0f2fe); border-color: #bae6fd; }
        .stat-card--amber  { background: linear-gradient(135deg, var(--clr-amber-bg), #fef3c7); border-color: var(--clr-amber-border); }
        .stat-card--green  { background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-color: #bbf7d0; }
        .stat-value { font-size: 2rem; font-weight: 800; color: var(--clr-text); line-height: 1; }
        .stat-label { font-size: .8rem; font-weight: 600; color: var(--clr-muted); margin-bottom: .35rem; }
        .stat-link { font-size: .78rem; font-weight: 600; color: var(--clr-primary); text-decoration: none; margin-top: .4rem; display: inline-block; }
        .stat-link:hover { text-decoration: underline; }
        .stat-icon {
            width: 46px; height: 46px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .stat-icon--sky   { background: #bae6fd; }
        .stat-icon--amber { background: #fde68a; }
        .stat-icon--green { background: #bbf7d0; }
        .stat-icon svg { width: 22px; height: 22px; }

        /* ── Main grid ─────────────────────────────────────────── */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }
        @media (max-width: 700px) { .dashboard-grid { grid-template-columns: 1fr; } }

        /* ── Doctors card ──────────────────────────────────────── */
        .section-title {
            font-family: var(--font-head);
            font-size: 1.05rem;
            color: var(--clr-text);
            margin: 0 0 1rem;
            padding-bottom: .65rem;
            border-bottom: 1px solid var(--clr-border);
        }
        .doctor-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; }
        .doctor-item {
            border: 1px solid var(--clr-border);
            border-radius: 10px;
            padding: 1rem;
            transition: box-shadow .18s;
        }
        .doctor-item:hover { box-shadow: var(--shadow-md); }
        .doctor-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: .6rem; }
        .doctor-name { font-weight: 700; font-size: .9rem; color: var(--clr-text); }
        .doctor-spec { font-size: .75rem; color: var(--clr-muted); margin-top: .1rem; }
        .doctor-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-accent));
            color: #fff;
            font-weight: 700;
            font-size: .95rem;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .doctor-since { font-size: .72rem; color: var(--clr-muted); margin-bottom: .75rem; }
        .btn-contact {
            width: 100%;
            padding: .45rem;
            border-radius: 7px;
            background: var(--clr-primary-light);
            color: var(--clr-primary);
            border: none;
            font-size: .78rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .18s;
        }
        .btn-contact:hover { background: var(--clr-accent); color: #fff; }

        /* ── Quick actions ─────────────────────────────────────── */
        .quick-actions { display: flex; flex-direction: column; gap: .6rem; }
        .quick-action-link {
            display: block;
            padding: .7rem 1rem;
            border-radius: 9px;
            background: var(--clr-bg);
            border: 1px solid var(--clr-border);
            text-decoration: none;
            font-size: .85rem;
            font-weight: 600;
            color: var(--clr-text);
            transition: background .18s, border-color .18s;
            text-align: center;
        }
        .quick-action-link:hover { background: var(--clr-primary-light); border-color: var(--clr-accent); color: var(--clr-primary); }

        /* ── Info banner ───────────────────────────────────────── */
        .info-banner {
            background: linear-gradient(135deg, #ecfdf5, #f0fdf4);
            border: 1px solid #a7f3d0;
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            font-size: .85rem;
            color: #065f46;
        }

        /* ── Floating urgent btn ───────────────────────────────── */
        .floating-urgent-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: #fff;
            border-radius: 99px;
            padding: .75rem 1.4rem;
            display: flex;
            align-items: center;
            gap: .5rem;
            font-weight: 700;
            font-size: .9rem;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(220,38,38,.35);
            transition: transform .18s, box-shadow .18s;
            z-index: 99;
        }
        .floating-urgent-btn:hover { transform: translateY(-2px); box-shadow: 0 6px 28px rgba(220,38,38,.45); }
        .floating-urgent-btn svg { width: 20px; height: 20px; }

        /* ── Dark mode ─────────────────────────────────────────── */
        @media (prefers-color-scheme: dark) {
            :root {
                --clr-bg: #111a18;
                --clr-surface: #1a2724;
                --clr-text: #e6efed;
                --clr-muted: #8fa9a3;
                --clr-border: #2a3d38;
                --clr-primary-light: #1e3530;
            }
            .diary-textarea { background: #111a18; color: var(--clr-text); }
            .quick-action-link { background: #1a2724; }
            .stat-card--sky   { background: linear-gradient(135deg, #0c2233, #0c2d40); border-color: #1e4a6e; }
            .stat-card--amber { background: linear-gradient(135deg, #2a1f08, #3a2a0a); border-color: #6b4a10; }
            .stat-card--green { background: linear-gradient(135deg, #0a2016, #0d2a1c); border-color: #1a4a2e; }
        }
    </style>

    {{-- Nav pills (debajo del header, antes del contenido) --}}
    <div style="width:100%; padding:1.5rem; display:flex; align-items:center; justify-content:space-between; gap:2rem; background: var(--clr-surface); border-bottom: 1px solid var(--clr-border);">
        <div style="flex: 1;">
            <h1 style="font-family: var(--font-head); font-size: 1.8rem; font-weight: 700; color: var(--clr-text); margin: 0;">¡Hola, {{ auth()->user()->name }}!</h1>
            <p style="font-size: 0.9rem; color: var(--clr-muted); margin: 0.4rem 0 0;">Tu bienestar es tu prioridad. Aquí tienes tu resumen de hoy.</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="notification-chip" type="button" aria-label="Notificaciones">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="notif-badge">3</span>
            </button>
            <div class="profile-dropdown">
                <button class="profile-chip" type="button" aria-label="Perfil" onclick="toggleProfileMenu(event)">
                    <span class="avatar">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </button>

                <div class="profile-menu" id="profileMenu">
                    <div class="profile-menu-header">
                        <div class="profile-menu-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                        <div class="profile-menu-info">
                            <p class="profile-menu-name">{{ auth()->user()->name }}</p>
                            <p class="profile-menu-email">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="profile-menu-divider"></div>
                    <a href="{{ route('diarios.index') }}" class="profile-menu-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        Mis diarios
                    </a>
                    <a href="{{ route('chats.index') }}" class="profile-menu-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Mis chats
                    </a>
                    <a href="{{ route('doctores.index') }}" class="profile-menu-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <path d="M20 8v6"></path>
                            <path d="M23 11h-6"></path>
                        </svg>
                        Mis doctores
                    </a>
                    <a href="{{ route('foro.index') }}" class="profile-menu-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            <circle cx="9" cy="10" r="1"></circle>
                            <circle cx="12" cy="10" r="1"></circle>
                            <circle cx="15" cy="10" r="1"></circle>
                        </svg>
                        Foro
                    </a>
                    <div class="profile-menu-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="profile-menu-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        Mi Perfil
                    </a>
                    <a href="{{ route('profile.edit') }}" class="profile-menu-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="1"></circle>
                            <path d="M12 1v6m0 6v6"></path>
                            <path d="M4.22 4.22l4.24 4.24m2.12 5.08l4.24 4.24"></path>
                            <path d="M1 12h6m6 0h6"></path>
                            <path d="M4.22 19.78l4.24-4.24m5.08-2.12l4.24-4.24"></path>
                        </svg>
                        Configuración
                    </a>
                    <div class="profile-menu-divider"></div>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="profile-menu-item profile-menu-logout">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="dash-wrapper">

        {{-- ── Sección: Diario del día ─────────────────────────── --}}
        <section class="dash-card diary-card">
            <div>
                <h2>Diario del día</h2>
                <p class="card-subtitle">Escribe cómo te sientes hoy y elige un emoji que represente tu estado emocional.</p>
            </div>

            @if($todayDiary)
                {{-- Diario ya guardado para hoy --}}
                <div style="background: linear-gradient(135deg, #ecfdf5, #f0fdf4); border: 1px solid #a7f3d0; border-radius: var(--radius); padding: 1rem 1.25rem; margin-bottom: 1rem; font-size: .85rem; color: #065f46;">
                    <strong>✓ Diario guardado hoy</strong>
                    <p style="margin: 0.5rem 0 0; font-size: 0.8rem;">Ya guardaste tu diario el {{ $todayDiary->fecha->format('d/m/Y') }} a las {{ $todayDiary->updated_at->format('H:i') }}. Solo se permite un diario por día.</p>
                </div>
                <div style="background: var(--clr-primary-light); border-radius: 10px; padding: 1rem; margin-bottom: 1rem;">
                    <p style="font-size: 0.8rem; color: var(--clr-muted); margin: 0 0 0.5rem; font-weight: 600;">Tu entrada:</p>
                    <p style="font-size: 0.9rem; color: var(--clr-text); margin: 0; line-height: 1.5;">{{ $todayDiary->contenido }}</p>
                    @if($todayDiary->emoji)
                        <p style="font-size: 1.3rem; margin-top: 0.75rem;">{{ $todayDiary->emoji }}</p>
                    @endif
                </div>
            @else
                {{-- Formulario para crear diario --}}
                <label class="diary-label" for="diario-dia">¿Qué pasó hoy?</label>
                <textarea id="diario-dia" class="diary-textarea"
                    placeholder="Escribe una nota breve sobre tu día, tus pensamientos o cómo te has sentido."></textarea>

                <div class="emoji-selector">
                    <span class="emoji-selector-title">Cómo te sientes</span>
                    <div class="emoji-options">
                        @foreach(['😄','🙂','😐','😕','😔','😢'] as $emoji)
                            <label class="emoji-option">
                                <input type="radio" name="estado-emocional" value="{{ $emoji }}" @if($loop->first) checked @endif>
                                <span>{{ $emoji }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="diary-actions">
                    <button class="btn-primary-small" type="button" id="guardar-diario">Guardar en mi diario</button>
                    <span class="diary-helper">Se guardará en tu diario personal.</span>
                </div>
            @endif
            <p id="diary-status" class="diary-status" aria-live="polite"></p>
        </section>

        {{-- ── Stats ──────────────────────────────────────────── --}}
        <div class="stats-grid">
            <div class="stat-card stat-card--sky">
                <div>
                    <p class="stat-label">Doctores Conectados</p>
                    <p class="stat-value">{{ auth()->user()->doctors()->count() }}</p>
                    <a href="{{ route('doctores.mis-doctores') }}" class="stat-link">Ver detalles →</a>
                </div>
                <div class="stat-icon stat-icon--sky">
                    <svg fill="none" stroke="#0284c7" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card stat-card--amber">
                <div>
                    <p class="stat-label">Solicitudes Pendientes</p>
                    <p class="stat-value">{{ auth()->user()->pendingDoctorRequests()->count() }}</p>
                    <a href="{{ route('doctores.index') }}" class="stat-link">Explorar directorio →</a>
                </div>
                <div class="stat-icon stat-icon--amber">
                    <svg fill="none" stroke="#d97706" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card stat-card--green">
                <div>
                    <p class="stat-label">Acciones Rápidas</p>
                    <div class="quick-actions" style="margin-top:.5rem;">
                        <a href="{{ route('doctores.index') }}"       class="quick-action-link">🔍 Buscar Doctor</a>
                        <a href="{{ route('doctores.mis-doctores') }}" class="quick-action-link">👥 Ver Mis Doctores</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Mis Doctores Conectados ─────────────────────────── --}}
        @if(auth()->user()->doctors()->exists())
            <div class="dash-card" style="margin-bottom:1.5rem;">
                <h3 class="section-title">Mis Doctores</h3>
                <div class="doctor-grid">
                    @foreach(auth()->user()->doctors()->get() as $relation)
                        <div class="doctor-item">
                            <div class="doctor-top">
                                <div>
                                    <p class="doctor-name">{{ $relation->doctor->name }}</p>
                                    <p class="doctor-spec">
                                        {{ $relation->doctor->rol == 2 ? 'Psicólogo' : 'Psiquiatra' }}
                                    </p>
                                </div>
                                <div class="doctor-avatar">{{ substr($relation->doctor->name, 0, 1) }}</div>
                            </div>
                            <p class="doctor-since">Conectado desde {{ $relation->updated_at->format('d/m/Y') }}</p>
                            <button class="btn-contact">Contactar</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- ── Consejo ─────────────────────────────────────────── --}}
        <div class="info-banner">
            💡 <strong>Consejo:</strong> Conecta con doctores para que puedan ver tu información médica y seguimiento.
            Puedes gestionar múltiples doctores simultáneamente.
        </div>
    </div>

    {{-- Botón flotante de Auxilio --}}
    {{-- <a class="floating-urgent-btn" href="{{ route('auxilio.index') }}"
        title="Solicitar ayuda urgente" aria-label="Solicitar ayuda urgente">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
            <path d="M12 8v4" stroke-linecap="round"/>
            <path d="M12 16h.01" stroke-linecap="round"/>
        </svg>
        Auxilio
    </a> --}}

    {{-- Script del diario (equivalente a diario-paciente.js) --}}
    <script>
        // ── Toggle Profile Menu ────────────────────────────────
        function toggleProfileMenu(event) {
            event.stopPropagation();
            const menu = document.getElementById('profileMenu');
            menu.classList.toggle('active');
        }

        // Cerrar el menú al hacer click fuera
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('profileMenu');
            if (menu && !menu.parentElement.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        document.getElementById('guardar-diario')?.addEventListener('click', async function () {
            const texto  = document.getElementById('diario-dia').value.trim();
            const emoji  = document.querySelector('input[name="estado-emocional"]:checked')?.value ?? '😐';
            const status = document.getElementById('diary-status');
            const button = this;

            if (!texto) {
                status.style.color = '#ef4444';
                status.textContent = 'Escribe algo antes de guardar.';
                return;
            }

            // Deshabilitar el botón mientras se envía
            button.disabled = true;
            button.style.opacity = '0.6';
            status.style.color = 'var(--clr-primary)';
            status.textContent = 'Guardando...';

            try {
                const response = await fetch('{{ route("diarios.storeFromDashboard") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        contenido: texto,
                        emoji: emoji,
                    }),
                });

                const data = await response.json();

                if (data.success) {
                    status.style.color = '#059669';
                    status.textContent = `✓ ${data.message}`;
                    // Recargar la página después de 1.5 segundos
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    status.style.color = '#ef4444';
                    status.textContent = data.message || 'Error al guardar el diario.';
                    button.disabled = false;
                    button.style.opacity = '1';
                }
            } catch (error) {
                console.error('Error:', error);
                status.style.color = '#ef4444';
                status.textContent = 'Error al conectar con el servidor.';
                button.disabled = false;
                button.style.opacity = '1';
            }
        });
    </script>
