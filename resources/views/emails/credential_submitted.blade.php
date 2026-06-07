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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #3b82f6;
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
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #3b82f6;
            margin-bottom: 12px;
            border-bottom: 2px solid #3b82f6;
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
        .success-message {
            background-color: #d1fae5;
            border: 1px solid #10b981;
            border-left: 4px solid #10b981;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #065f46;
        }
        .success-message strong {
            color: #059669;
        }
        .button {
            display: inline-block;
            background-color: #3b82f6;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: 600;
        }
        .button:hover {
            background-color: #2563eb;
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
            <h1>Solicitud Recibida</h1>
        </div>

        <div class="content">
            <div class="success-message">
                <strong>¡Gracias!</strong> Tu solicitud de credencial profesional ha sido <strong>recibida correctamente</strong>.
            </div>

            <div class="section">
                <div class="section-title">Información Registrada</div>
                <div class="info-row">
                    <span class="info-label">Nombre:</span>
                    <span class="info-value">{{ $notifiable->name }}</span>
                </div>
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
                <div class="section-title">Próximos Pasos</div>
                <p style="color: #666; margin: 15px 0;">
                    Tu solicitud está siendo revisada por nuestro equipo de administración. Este proceso puede tomar entre 24 a 48 horas.
                </p>
                <ul style="color: #666; margin: 15px 0;">
                    <li>Se verificarán todos tus datos profesionales</li>
                    <li>Se validará la autenticidad de tus credenciales</li>
                    <li>Recibirás una notificación por correo cuando se complete la revisión</li>
                </ul>
            </div>

            <div class="section">
                <p style="color: #999; font-size: 13px;">
                    <strong>Nota:</strong> No tendrás acceso completo a todas las funcionalidades de la plataforma hasta que tu cuenta sea aprobada. Mientras tanto, puedes actualizar tu perfil y preparar tu participación en la comunidad.
                </p>
            </div>

            <center>
                <a href="{{ route('credentials.pending') }}" class="button">Ver Estado de mi Solicitud</a>
            </center>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Iris Fepi. Todos los derechos reservados.</p>
            <p>Si tienes preguntas, no dudes en contactarnos.</p>
        </div>
    </div>
</body>
</html>
