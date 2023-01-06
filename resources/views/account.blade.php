<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | RedStore</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png')}}" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/products') }}">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="{{ url('/account') }}">Account</a></li>
                </ul>
            </nav>
            <a href="{{ url('/cart') }}"><img src="{{ asset('images/cart.png')}}" width="30px" height="30px"></a>
            <img src="{{ asset('images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <!-- Account Page -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('images/image1.png')}}" width="100%">
                </div>
                <div class="col-2">
                    @if(session()->has('error'))
                    <div class="alert alert-warning">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Register</span>
                            <span onclick="login()">Login</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" method="GET" action="/users">
                            @csrf
                            <input type="text" name="uname" placeholder="Username">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forget Password</a>
                        </form>

                        <form id="RegForm" method="POST" action="/users">
                            @csrf
                            <input type="text" name="uname" placeholder="Username">
                            <input type="text" name="email" placeholder="Email">
                            <input type="text" name="mobile" placeholder="Mobile No.">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" name="reg" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('layouts.footer')

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

    <!-- Toggle Form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        function register() {
            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translateX(0px)";

        }
        function login() {
            RegForm.style.transform = "translatex(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translate(100px)";

        }
    </script>

</body>

</html>
