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
            background-color: #ef4444;
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
            color: #ef4444;
            margin-bottom: 12px;
            border-bottom: 2px solid #ef4444;
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
        .warning-message {
            background-color: #fee2e2;
            border: 1px solid #ef4444;
            border-left: 4px solid #ef4444;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #7f1d1d;
        }
        .warning-message strong {
            color: #dc2626;
        }
        .reason-box {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-left: 4px solid #ef4444;
            padding: 15px;
            border-radius: 4px;
            margin: 15px 0;
            color: #333;
        }
        .button {
            display: inline-block;
            background-color: #ef4444;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: 600;
        }
        .button:hover {
            background-color: #dc2626;
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
            <h1>Credencial Requiere Ajustes</h1>
        </div>

        <div class="content">
            <div class="warning-message">
                <strong>Acción Requerida:</strong> Tu solicitud de credencial profesional ha sido <strong>rechazada</strong>. 
                Por favor revisa los detalles abajo y realiza los ajustes necesarios.
            </div>

            <div class="section">
                <div class="section-title">Información de tu Solicitud</div>
                <div class="info-row">
                    <span class="info-label">Nombre:</span>
                    <span class="info-value">{{ $notifiable->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Cédula Profesional:</span>
                    <span class="info-value">{{ $credential->professional_id }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Institución de Licenciatura:</span>
                    <span class="info-value">{{ $credential->university }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha de Rechazo:</span>
                    <span class="info-value">{{ $credential->reviewed_at?->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Razón del Rechazo</div>
                <div class="reason-box">
                    {{ $credential->admin_notes }}
                </div>
            </div>

            <div class="section">
                <p style="color: #666; margin: 15px 0;">
                    Puedes corregir tu solicitud y reenviarla en cualquier momento. Los cambios realizados serán revisados nuevamente por nuestro equipo de verificación.
                </p>
            </div>

            <center>
                <a href="{{ route('credentials.rejected', $credential) }}" class="button">Reenviar Solicitud</a>
            </center>

            <p style="color: #999; font-size: 13px; margin-top: 30px; text-align: center;">
                Si tienes preguntas sobre el rechazo, por favor contacta a nuestro equipo de soporte.
            </p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Iris Fepi. Todos los derechos reservados.</p>
            <p>Si tienes preguntas, no dudes en contactarnos.</p>
        </div>
    </div>
</body>
</html>
