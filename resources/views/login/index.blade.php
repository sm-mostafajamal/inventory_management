<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Inverntory Management
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet"/>
    <!-- CSS Files -->
    <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="wrapper">
    <div class="bg-img">
        <div class="content">
            <x-notification />
            <header>Login</header>
            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="password" placeholder="Password">
                    <span class="show">SHOW</span>
                </div>
                <div class="pass">
                    <span style="color:white">For Testing purpose [username: admin, Password: 123456]</span>
                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Login page */
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        user-select: none;
    }

    .bg-img {
        background: url("assets/img/header.jpg");
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    .bg-img:after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.7);
    }

    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 999;
        text-align: center;
        padding: 60px 32px;
        width: 370px;
        transform: translate(-50%, -50%);
        background: rgba(255, 255, 255, 0.04);
        box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
    }

    .content header {
        color: white;
        font-size: 33px;
        font-weight: 600;
        margin: 0 0 35px 0;
        font-family: 'Montserrat', sans-serif;
    }

    .field {
        position: relative;
        height: 45px;
        width: 100%;
        display: flex;
        background: rgba(255, 255, 255, 0.94);
    }

    .field span {
        color: #222;
        width: 40px;
        line-height: 45px;
    }

    .field input {
        height: 100%;
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
        color: #222;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
    }

    .space {
        margin-top: 16px;
    }

    .show {
        position: absolute;
        right: 13px;
        font-size: 13px;
        font-weight: 700;
        color: #222;
        display: none;
        cursor: pointer;
        font-family: 'Montserrat', sans-serif;
    }

    .pass-key:valid ~ .show {
        display: block;
    }

    .pass {
        text-align: left;
        margin: 10px 0;
    }

    .pass a {
        color: white;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
    }

    .pass:hover a {
        text-decoration: underline;
    }

    .field input[type="submit"] {
        background: #344675;
        background-image: -webkit-linear-gradient(0deg, #344675 0%, #263148 100%);
        background-image: -o-linear-gradient(0deg, #344675 0%, #263148 100%);
        background-image: -moz-linear-gradient(0deg, #344675 0%, #263148 100%);
        background-image: linear-gradient(0deg, #344675 0%, #263148 100%);
        box-shadow: 0px 0px 45px 0px rgba(0, 0, 0, 0.6);
        transition: 0.5s cubic-bezier(0.685, 0.0473, 0.346, 1);


        color: white;
        font-size: 18px;
        letter-spacing: 1px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'Montserrat', sans-serif;
    }

    .links i {
        font-size: 17px;
    }

    i span {
        margin-left: 8px;
        font-weight: 500;
        letter-spacing: 1px;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
    }

</style>
<script>
    const pass_field = document.querySelector('.pass-key');
    const showBtn = document.querySelector('.show');
    showBtn.addEventListener('click', function () {
        if (pass_field.type === "password") {
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
        } else {
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
        }
    });
</script>
</body>
</html>
