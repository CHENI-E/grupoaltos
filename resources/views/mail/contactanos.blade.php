<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de cliente</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .email-container {
            width: 600px;
            background-color: #ffffff;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f1f1;
        }
        .email-header img {
            max-width: 200px;
        }
        .email-header h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-top: 15px;
        }
        .email-body {
            margin-top: 20px;
        }
        .email-body p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }
        .email-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .email-table th, .email-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }
        .email-table th {
            background-color: #0078d4;
            color: white;
        }
        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            padding-top: 20px;
            border-top: 1px solid #f1f1f1;
            margin-top: 30px;
        }
        .email-footer a {
            color: #0078d4;
            text-decoration: none;
        }
        .cta-button {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table class="email-wrapper">
        <tr>
            <td>
                <table class="email-container">
                    <!-- Header -->
                    <tr class="email-header">
                        <td>
                            <img src="https://www.grupoaltos.com.pe/ecommerce/assets/web/logo/LOGO-ALTOS-COLOR.png" alt="Logo de tu empresa">
                            <h2>¡Nuevo mensaje de un cliente!</h2>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr class="email-body">
                        <td>
                            <p>Has recibido un nuevo mensaje a través del formulario de contacto en tu página web. A continuación, te dejamos los detalles del cliente:</p>
                            <table class="email-table">
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Correo electrónico</th>
                                    <td>{{ $data['email'] }}</td>
                                </tr>
                                <tr>
                                    <th>Teléfono</th>
                                    <td>{{ $data['phone'] }}</td>
                                </tr>
                                <tr>
                                    <th>Mensaje</th>
                                    <td>{{ $data['message'] }}</td>
                                </tr>
                            </table>
                            <p style="text-align:center;">
                                <a href="mailto:{{ $data['email'] }}" class="cta-button">Responder al cliente</a>
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr class="email-footer">
                        <td>
                            <p>Gracias por usar nuestros servicios. Si tienes alguna pregunta o necesitas más información, por favor no dudes en ponerte en contacto con nosotros.</p>
                            <p>&copy; 2025 *Grupo ALtos* – Todos los derechos reservados.</p>
                            <p><a href="https://www.grupoaltos.com.pe/">Visitar nuestro sitio web</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
