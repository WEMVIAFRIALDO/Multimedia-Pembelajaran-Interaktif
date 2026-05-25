<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood-Sync</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            color: #667eea;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        a {
            text-decoration: none;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s;
            display: inline-block;
        }
        .btn-login {
            background: #667eea;
            color: white;
        }
        .btn-login:hover {
            background: #5568d3;
            transform: translateY(-2px);
        }
        .btn-register {
            background: #f0f0f0;
            color: #667eea;
            border: 2px solid #667eea;
        }
        .btn-register:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mood-Sync</h1>
        <p>Sistem Pembelajaran Interaktif yang Menyesuaikan dengan Mood Anda</p>
        <div class="button-group">
            <a href="/login" class="btn-login">Login</a>
            <a href="/register" class="btn-register">Daftar</a>
        </div>
    </div>
</body>
</html>