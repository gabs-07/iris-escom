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
        --radius:       14px;
        --shadow-sm:    0 1px 4px rgba(0,0,0,.07);
        --shadow-md:    0 4px 18px rgba(0,0,0,.10);
        --font-head:    'Georgia', 'Times New Roman', serif;
        --font-body:    'Segoe UI', system-ui, sans-serif;
    }

    body { background: var(--clr-bg); font-family: var(--font-body); margin: 0; padding: 0; }

    /* ── Header bar ────────────────────────────────────────── */
    .navbar-top {
        width: 100%;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
        background: var(--clr-surface);
        border-bottom: 1px solid var(--clr-border);
        box-sizing: border-box;
    }
    .navbar-left { flex: 1; }
    .navbar-left h1 { font-family: var(--font-head); font-size: 1.8rem; font-weight: 700; color: var(--clr-text); margin: 0; }
    .navbar-left p { font-size: 0.9rem; color: var(--clr-muted); margin: 0.4rem 0 0; }
    .navbar-right { display: flex; align-items: center; gap: 1rem; }

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

    .profile-dropdown { position: relative; }
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
    .profile-menu.active { display: block; }
    @keyframes slideDown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }

    .profile-menu-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        border-bottom: 1px solid var(--clr-border);
    }
    .profile-menu-avatar {
        width: 40px; height: 40px; border-radius: 50%;
        background: linear-gradient(135deg, var(--clr-primary), var(--clr-accent));
        color: #fff; display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 1rem; flex-shrink: 0;
    }
    .profile-menu-info { flex: 1; min-width: 0; }
    .profile-menu-name { font-weight: 700; font-size: 0.9rem; color: var(--clr-text); margin: 0; word-break: break-word; }
    .profile-menu-email { font-size: 0.75rem; color: var(--clr-muted); margin: 0.2rem 0 0; word-break: break-word; }
    .profile-menu-divider { height: 1px; background: var(--clr-border); margin: 0; }
    .profile-menu-item {
        display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem;
        border: none; background: none; color: var(--clr-text);
        text-decoration: none; font-size: 0.85rem; font-weight: 500;
        cursor: pointer; width: 100%; text-align: left; transition: background 0.18s, color 0.18s;
    }
    .profile-menu-item:hover { background: var(--clr-primary-light); color: var(--clr-primary); }
    .profile-menu-item svg { width: 18px; height: 18px; flex-shrink: 0; }
    .profile-menu-logout:hover { background: #fee2e2; color: #ef4444; }

    /* ── Wrapper ────────────────────────────────────────── */
    .dash-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1.5rem 4rem;
    }

    /* ── Cards ────────────────────────────────────────────── */
    .dash-card {
        background: var(--clr-surface);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        padding: 1.5rem;
        transition: box-shadow .2s;
    }
    .dash-card:hover { box-shadow: var(--shadow-md); }

    /* ── Header content ────────────────────────────────────── */
    .page-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .page-header-left h2 {
        font-family: var(--font-head);
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--clr-text);
        margin: 0;
    }
    .page-header-left p {
        font-size: 0.85rem;
        color: var(--clr-muted);
        margin: 0.4rem 0 0;
    }
    .page-header-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }

    /* ── Buttons ────────────────────────────────────────── */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background 0.18s, color 0.18s;
        text-decoration: none;
    }
    .btn-primary {
        background: var(--clr-primary);
        color: #fff;
    }
    .btn-primary:hover { background: #3a6358; }
    .btn-secondary {
        background: var(--clr-border);
        color: var(--clr-text);
        border: 1px solid #ccc;
    }
    .btn-secondary:hover { background: #e8ebe9; }

    /* ── Diary content ────────────────────────────────────── */
    .diary-meta {
        background: var(--clr-primary-light);
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
    }
    .diary-meta-label { font-size: 0.8rem; color: var(--clr-muted); font-weight: 600; margin: 0 0 0.5rem; }
    .diary-meta-value { font-size: 1rem; color: var(--clr-text); font-weight: 700; margin: 0; }
    .diary-meta-time { font-size: 0.8rem; color: var(--clr-muted); margin-top: 0.4rem; }

    .diary-text {
        font-size: 0.95rem;
        line-height: 1.7;
        color: var(--clr-text);
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    .diary-emoji { font-size: 2rem; margin-top: 1rem; }

    /* ── List items ────────────────────────────────────────── */
    .diary-list-item {
        border-radius: 10px;
        border: 1px solid var(--clr-border);
        padding: 1rem;
        transition: box-shadow .18s;
    }
    .diary-list-item:hover { box-shadow: var(--shadow-md); }
    .diary-list-item-date { font-size: 0.9rem; font-weight: 700; color: var(--clr-text); margin: 0 0 0.3rem; }
    .diary-list-item-time { font-size: 0.75rem; color: var(--clr-muted); margin: 0; }
    .diary-list-item-preview { font-size: 0.85rem; color: var(--clr-muted); margin: 0.75rem 0 0; line-height: 1.5; }

    /* ── Dark mode ────────────────────────────────────────── */
    @media (prefers-color-scheme: dark) {
        :root {
            --clr-bg: #111a18;
            --clr-surface: #1a2724;
            --clr-text: #e6efed;
            --clr-muted: #8fa9a3;
            --clr-border: #2a3d38;
            --clr-primary-light: #1e3530;
        }
    }
</style>

{{-- Navbar --}}
<div class="navbar-top">
    <div class="navbar-left">
        <h1>Mi Diario</h1>
        <p>Consulta tu registro guardado</p>
    </div>
    <div class="navbar-right">
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
                <a href="{{ route('dashboard.paciente') }}" class="profile-menu-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('profile.edit') }}" class="profile-menu-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Mi Perfil
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
    {{-- Header --}}
    <div class="page-header">
        <div class="page-header-left">
            <h2>Diario del {{ $diario->fecha->format('d/m/Y') }}</h2>
            <p>Consulta tu registro guardado.</p>
        </div>

        <div class="page-header-actions">
            <a href="{{ route('diarios.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>

    @if (session('status'))
        <div style="background: linear-gradient(135deg, #ecfdf5, #f0fdf4); border: 1px solid #a7f3d0; border-radius: var(--radius); padding: 1rem 1.25rem; font-size: .85rem; color: #065f46; margin-bottom: 1.5rem;">
            ✓ {{ session('status') }}
        </div>
    @endif

    <div class="dash-card">
        <div class="diary-meta">
            <p class="diary-meta-label">Fecha registrada</p>
            <p class="diary-meta-value">{{ $diario->fecha->format('d/m/Y') }}</p>
            <p class="diary-meta-time">Guardado el {{ $diario->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="diary-text">{{ $diario->contenido }}</div>

        @if($diario->emoji)
            <div class="diary-emoji">{{ $diario->emoji }}</div>
        @endif
    </div>
</div>

<script>
    function toggleProfileMenu(event) {
        event.stopPropagation();
        const menu = document.getElementById('profileMenu');
        menu.classList.toggle('active');
    }

    document.addEventListener('click', function(event) {
        const menu = document.getElementById('profileMenu');
        if (menu && !menu.parentElement.contains(event.target)) {
            menu.classList.remove('active');
        }
    });
</script>