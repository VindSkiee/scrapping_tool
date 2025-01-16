<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f9f9fb;
        }

        /* Bagian kiri (gambar) */
        .left-container {
            flex: 1;
            background: linear-gradient(135deg, rgba(104, 195, 255, 0.8), rgba(0, 97, 175, 0.8)),
                        url('path/to/your/background-image.png') no-repeat center center; /* Tambahkan gambar latar belakang */
            background-size: cover;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .left-container h1 {
            font-size: 48px;
            font-weight: bold;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .left-container p {
            font-size: 18px;
            font-weight: 300;
            max-width: 400px;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Bagian kanan (form login) */
        .right-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
            padding: 40px;
        }

        /* Kotak login */
        .login-box {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h3 {
            font-size: 26px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .login-box p {
            font-size: 14px;
            color: #888;
            margin-bottom: 20px;
        }

        /* Input dan tombol */
        .form-control {
            border-radius: 25px;
            height: 45px;
            padding: 10px 20px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            border-radius: 25px;
            height: 45px;
            background: linear-gradient(135deg, #68c3ff, #0061af);
            border: none;
            font-weight: bold;
            text-transform: uppercase;
            width: 100%;
            color: white;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #4ea3df, #004c8a);
            transform: translateY(-2px);
        }

        /* Teks tambahan */
        .forgot-link {
            display: block;
            text-align: right;
            font-size: 12px;
            color: #0061af;
            text-decoration: none;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Link navigasi */
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .nav-links a {
            font-size: 14px;
            color: #0061af;
            text-decoration: none;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .left-container {
                display: none;
            }
            .right-container {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Bagian Kiri -->
    <div class="left-container">
        <div>
            <!-- Tambahkan gambar logo di sini -->
            <img src="{{ asset('images/csirt.png') }}" alt="Logo" style="max-width: 150px; margin-bottom: 20px;">  <!-- Gantilah path ke gambar logo Anda -->
            <h1>Welcome to CSIRT Purwakarta</h1>
        </div>
    </div>

    <!-- Bagian Kanan -->
    <div class="right-container">
        <div class="login-box">
            <!-- Tambahkan gambar desain keren di sini -->
            <img src="{{ asset('images/logo.png') }}" alt="Desain Keren" style="width: 30%; margin-bottom: 20px; border-radius: 10px;">  <!-- Gantilah path ke gambar desain Anda -->
            <h3>Welcome back</h3>
            <p>Please log in to your account</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" class="form-control" name="username" placeholder="User Name" required>
                <input type="password" class="form-control" name="password" placeholder="Pass Word" required>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
