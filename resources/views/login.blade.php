<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background: url('/images/bg.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            animation: animateBg 5s linear infinite;
        }

        @keyframes animateBg {
            100% {
                filter: hue-rotate(360deg);
            }
        }

        .login-box{
            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .5);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(15px);
        }
        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
        }
        .input-box{
            position: relative;
            width: 310px;
            margin: 30px 0;
            border-bottom: 2px solid #fff;
        }
        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;

        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            padding: 0 35px 0 5px;
        }
        .input-box .icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            line-height: 57px;
        }
        .remember-forgot {
            margin: -15px 0 15px;
            font-size: .9em;
            color: #fff;
            justify-content: space-between;
        }
        .remember-forgot label input {
            margin-right: 3px;
        }
        .remember-forgot a {
            color: #fff;
            text-decoration: none;
        }
        .remember-forgot a:hover {
            text-decoration: underline;
        }
        button {
            width: 100%;
            height: 40px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 1em;
            color: #000;
            font-weight: 500;
        }

        .register-link {
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }

        @media (max-width: 360px){
            .login-box {
                width: 100%;
                height: 100vh;
                border: none;
                border-radius: 0;
            }

            .input-box {
                width: 290px;

            }
        }

    </style>
</head>
<body>
    <section>

   <div class="login-box">
    <form action="">
        <h2>Login</h2>
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="name" required>
            <label>Username</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" required>
            <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Remember me</label>
        </div>
        <button type="submit">Login</button>
    </form>
    </div>
    </section>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
