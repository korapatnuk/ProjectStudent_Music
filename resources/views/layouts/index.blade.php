<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout - @yield('title', 'welcome home')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/plugins/slick-slide/slick.css">
    <link rel="stylesheet" href="/plugins/slick-slide/slick-theme.css">
    @stack('css')
    <style>
        .btn-register-login,
        .is-font {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body class="frontend">
    <header class="p-3 text-bg-dark">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-end justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <img style="width: 154px;" src="{{ asset('images/logo-b.png') }}" alt="Logo" srcset="">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">HOME</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">ARIST</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">ABOUT US</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">CONTACT US</a></li>
                </ul>


                <div class="text-end">
                    <button type="button" class="btn btn-warning btn-register-login" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">สมัครสมาชิก/เข้าสู่ระบบ</button>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-dark">

                <div class="modal-body">
                  <div class="d-flex flex-column gap-4">
                    <div class="text-center">
                        <img style="width: 154px;" class="m-auto" src="{{ asset('images/logo-b.png') }}" alt="Logo" srcset="">
                    </div>
                    <div class="text-center text-hilight">
                        <div class="fs-3">เข้าสู่ระบบ</div>
                    </div>
                    <form action="">
                        <input class="form-control mb-2" type="text" placeholder="Username" aria-label="default input example">
                        <input class="form-control mb-2" type="password" placeholder="Password" aria-label="default input example">
                    </form>
                    <div>
                        <button type="button" class="btn btn-warning w-100 btn-md is-font">เข้าสู่ระบบ</button>
                    </div>
                    <div>
                        ยังไม่ได้เป็นสมาชิก ? <a href="{{ route('register') }}" class="text-pink"> คลิ๊กที่นี่</a>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="/plugins/slick-slide/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@stack('js')

</html>
