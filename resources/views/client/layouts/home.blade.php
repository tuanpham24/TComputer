<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('images/icon/check.png')}}" sizes="16x16">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{asset('css/client/main.css')}}">

    {{-- Css trang con --}}
    @yield('page-css')

</head>
<body>
    
    <div class="wrapper">
        {{-- start header  --}}
        <header id="header">
            <div class="top-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6">
                            <h5 class="top-nav-title text-white">Your choice - Your life</h3>
                            
                                
                        </div>
                        <div class="col-xl-6">
                            <div class="dropdown account-dropdown">
                                <div class="btn dropdown-toggle text-white" type="button" id="dropDownTopNavAccount" data-bs-toggle="dropdown" aria-expanded="false">
                                    @php
                                        // $user_login = '';
                                        // if(session('user_name_cookie')){
                                        //     $user_auth = Session::get('user_auth');
                                        //     $user_login = $user_auth->name;
                                        // }
                                        // else{
                                        //     $user_login = 'Login';
                                        // }
                                        // echo $user_login;

                                        $user_login = '';
                                        if(Cookie::get('user_name') !== NULL){
                                            $user_login = Cookie::get('user_name');
                                        }
                                        else{
                                            $user_login = 'Login';
                                        }
                                        echo $user_login;
                                    @endphp
                                    
                                </div>
                                <ul class="dropdown-menu" aria-labelledby="dropDownTopNavAccount">
                                    <li><a class="dropdown-item" href="{{route('user.show-form-login')}}">Dang nhap</a></li>
                                    <li>

                                        {{-- @if (Cookie::get('user_name') !== NULL)
                                            <a href="">Dang xuat</a>
                                        @endif --}}

                                        @if (Cookie::get('user_name') !== NULL)
                                        <a class="dropdown-item" href="{{route('user.logout')}}">Dang xuat</a>
                                        @else
                                        <a class="dropdown-item" href="{{route('user.show-form-regis')}}">Dang ky</a>
                                        @endif
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-nav-container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 brand-logo"><a href="{{URL::to('/')}}"><img src="{{asset('images/logo/TStore-logo.png')}}" style="width: 90%; max-width: 100%;" alt=""></a></div>
                        <div class="col-xl-8 search-form">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>
                            
                        </div>
                        <div class="col-xl-2 cart-nav">
                            <a class="cart" href="{{route('products.cart')}}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="cart-quantity">{{Cart::count()}}</span>
                            </a>
                        </div>
                    </div>
                </div>                
            </div>
        </header>
        {{-- end header --}}

        {{-- start content --}}
        <div id="content-wrapper">
            <div class="container">        
                @yield('content')
            </div>
        </div>
        {{-- end content --}}

        {{-- Back to top --}}
        <div class="back-top">
            <button id="btn-back-to-top"><i class="fas fa-angle-up" style="color: #fff; padding: 5px;"></i></button>
        </div>
        {{-- Back to top --}}

        {{-- start footer --}}
        <footer id="footer">
            <div class="container">
                <div class="row" style="align-items: center; border-bottom: 2px solid #bbc5c1; padding-bottom: 20px;">
                    <div class="col-xl-4">
                        <a href="{{URL::to('/')}}"><img src="{{asset('images/logo/TStore-logo.png')}}" style="width: 80%; max-width: 100%;" alt=""></a>
                    </div>
                    <div class="col-xl-8 form-footer">
                        <form action="">
                            <div class="form-group">
                                <input type="email" placeholder="Enter your eamil here...">
                                <button class="btn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row" style="padding-top: 20px;">
                    <div class="col-xl-1">
                        <h4>Item</h4>
                        <ul>
                            <li>
                                <h5>Macbook</h5>
                            </li>
                            <li>
                                <h5>DELL</h5>
                            </li>
                            <li>
                                <h5>iPad</h5>
                            </li>
                            <li>
                                <h5>Phu kien</h5>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xl-3">
                        <h4>Constact us</h4>
                        <ul>
                            <li>
                                <h5><i class="fa-solid fa-phone"></i>(+84) 1900 6262</h5>
                            </li>
                            <li>
                                <h5><i class="fa-brands fa-facebook"></i>https://www.facebook.com/tstorevn</h5>
                            </li>
                            <li>
                                <h5><i class="fa-solid fa-envelope"></i>tstore@gmail.com</h5>
                            </li>
                            <li>
                                <h5><i class="fa-brands fa-square-twitter"></i>https://www.twitter.com/tstorevn</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-2">
                        <h4>Location</h4>
                        <ul>
                            <li>
                                <h5>Ha Noi</h5>
                            </li>
                            <li>
                                <h5>Hai Phong</h5>
                            </li>
                            <li>
                                <h5>Tp Ho Chi Minh</h5>
                            </li>
                            <li>
                                <h5>Da Nang</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.982368125312!2d105.79558491485453!3d21.033391485995917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab47b42f0543%3A0x85522387d91f54d4!2zxJAuIEPhuqd1IEdp4bqleSwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1660384571901!5m2!1svi!2s" width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                
            </div>
        </footer>
        {{-- end footer --}}
    </div>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Btn Back to top 
        window.onscroll = function () { scrollFunction() };
        function scrollFunction() {
            if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
                document.getElementById("btn-back-to-top").style.display = "block";
            } else {
                document.getElementById("btn-back-to-top").style.display = "none";
            }
        }
        document.getElementById('btn-back-to-top').addEventListener("click", function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });

        // Scroll Navbar fixed
        document.addEventListener("DOMContentLoaded", function () {
            let mainNav = document.querySelector('.main-nav-container')
            window.addEventListener('scroll', function () {
                if (window.scrollY > 250) {
                    mainNav.classList.add('fixed-top');
                    mainNav.style.boxShadow = "rgba(0, 0, 0, 0.15) 0px 5px 15px 0px";
                    mainNav.style.backgroundColor = "#fff"
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    mainNav.classList.remove('fixed-top');
                    mainNav.style.boxShadow = "none";
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
    </script>
</body>
</html>