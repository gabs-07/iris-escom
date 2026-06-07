<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #7c3aed;
            color: white;
            padding: 30px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            background-color: white;
            padding: 30px;
        }
        .alert {
            background-color: #fef3c7;
            border: 1px solid #fcd34d;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #92400e;
        }
        .alert strong {
            color: #d97706;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #7c3aed;
            margin-bottom: 12px;
            border-bottom: 2px solid #7c3aed;
            padding-bottom: 8px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .info-label {
            font-weight: 600;
            color: #666;
        }
        .info-value {
            color: #333;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #f3f4f6;
            padding: 10px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e5e7eb;
        }
        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e5e7eb;
        }
        .button {
            display: inline-block;
            background-color: #7c3aed;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: 600;
        }
        .button:hover {
            background-color: #6d28d9;
        }
        .footer {
            background-color: #f3f4f6;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-radius: 0 0 8px 8px;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            color: white;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Iris Fepi</div>
            <h1>Nueva Solicitud de Credencial</h1>
        </div>

        <div class="content">
            <div class="alert">
                <strong>Nueva solicitud recibida:</strong> Un profesional ha enviado su solicitud de credencial para revisión.
            </div>

            <div class="section">
                <div class="section-title">Información del Profesional</div>
                <div class="info-row">
                    <span class="info-label">Nombre:</span>
                    <span class="info-value">{{ $user->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Correo Electrónico:</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Rol:</span>
                    <span class="info-value">
                        @if((int) $user->rol === 2)
                            Psicólogo
                        @elseif((int) $user->rol === 3)
                            Psiquiatra
                        @else
                            Profesional
                        @endif
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha de Registro:</span>
                    <span class="info-value">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Datos de la Credencial</div>
                <div class="info-row">
                    <span class="info-label">Cédula Profesional:</span>
                    <span class="info-value">{{ $credential->professional_id }}</span>
                </div>
                @if($credential->specialty_id)
                <div class="info-row">
                    <span class="info-label">Cédula de Especialidad:</span>
                    <span class="info-value">{{ $credential->specialty_id }}</span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-label">Institución:</span>
                    <span class="info-value">{{ $credential->university }}</span>
                </div>
                @if($credential->postgraduate)
                <div class="info-row">
                    <span class="info-label">Posgrado:</span>
                    <span class="info-value">{{ $credential->postgraduate }}</span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-label">Años de Experiencia:</span>
                    <span class="info-value">{{ $credential->years_of_experience }} años</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha de Envío:</span>
                    <span class="info-value">{{ $credential->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Acciones Requeridas</div>
                <p style="color: #666; margin: 15px 0;">
                    Por favor, revisa esta solicitud en el panel de administración. Verifica la autenticidad de los documentos y proporciona tu decisión (aprobación o rechazo).
                </p>
            </div>

            <center>
                <a href="{{ route('admin.credentials.show', $credential) }}" class="button">Revisar Solicitud</a>
            </center>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Iris Fepi. Todos los derechos reservados.</p>
            <p>Administración de la plataforma.</p>
        </div>
    </div>
</body>
</html>
