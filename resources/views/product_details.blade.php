<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
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
                <a href="{{ url('/')}}"><img src="{{ asset('images/logo.png')}}" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('/products')}}">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="{{ url('/account')}}">Account</a></li>
                </ul>
            </nav>
            <a href="{{ url('/cart')}}"><img src="{{ asset('images/cart.png')}}" width="30px" height="30px"></a>
            <img src="{{ asset('images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <!-- Single Products -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset($images[0])}}" width="100%" id="ProductImg">

                <div class="small-img-row">
                    @if(isset($images[0]))
                        <div class="small-img-col">
                            <img src="{{ asset($images[0])}}" width="100%" class="small-img">
                        </div>
                    @endif
                    @if(isset($images[1]))
                        <div class="small-img-col">
                            <img src="{{ asset($images[1])}}" width="100%" class="small-img">
                        </div>
                    @endif
                    @if(isset($images[2]))
                        <div class="small-img-col">
                            <img src="{{ asset($images[2])}}" width="100%" class="small-img">
                        </div>
                    @endif
                    @if(isset($images[3]))
                        <div class="small-img-col">
                            <img src="{{ asset($images[3])}}" width="100%" class="small-img">
                        </div>
                    @endif
                </div>

            </div>
            <div class="col-2">
                <div id="error_message">

                </div>
                <p>{{$product->category->category_name}}</p>
                <h1>{{$product->name}}</h1>
                <h4>Price : {{$product->price}}</h4>
                <form method="POST" action="/add-to-cart">
                    @csrf
                    <select name="size">
                        <option value="">Select Size</option>
                        <option value="XXL">XXL</option>
                        <option value="XL">XL</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="S">S</option>
                    </select>
                    <input type="hidden" name="pid" value="{{$product->id}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <label>Amount</label><input name="quantity" id="qty" type="text" value="1" onchange="validateAmount(this.value,{{$product->id}} )">
                    <button type="submit" class="btn">Add To Cart</button>
                </form>

                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>{{$product->details}}</p>
            </div>
        </div>
    </div>
    <!-- title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <a href="/products"><p>View More</p></a>
        </div>
    </div>
    <!-- Products -->
    <div class="small-container">
        <div class="row">
            @foreach($related_products as $rel_product)
                <div class="col-4">
                    <a href="{{ url('/products/'. $rel_product->id) }}"><img src="{{ asset(explode('|', $rel_product->image)[0])}}"></a>
                    <h4>{{$rel_product->name}}</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>{{$rel_product->price}}</p>
                </div>
            @endforeach

        </div>
    </div>

   @include('layouts.footer')
    <!-- javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/custom.js"></script>
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

    <!-- product gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }

    </script>
</body>

</html>
