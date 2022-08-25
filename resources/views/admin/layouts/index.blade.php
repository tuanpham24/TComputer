<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{asset('images/icon/check.png')}}" sizes="16x16">
    <link rel="stylesheet" href="{{asset('css/client/main.css')}}">

    {{-- Css trang con --}}
    @yield('page-css')

</head>
<body>
    
    <div class="wrapper">
        <div class="container-fluid">
            <header class="header">
                <div class="container-fluid">
                    <div class="row">
                        <h3 class="db-brand">
                            <div class="col-xl-2 brand-logo">
                                <a href="{{URL::to('/')}}" class="text-white">
                                    {{-- <img src="{{asset('images/logo/TStore-logo.png')}}" style="width: 70%; max-width: 90%;" alt=""> --}}
                                    TStore Admin
                                </a>
                            </div>
                        </h3>
                    </div>
                </div>
            </header>
    
            <div class="row">
                <div class="col-xl-2 db-sidebar">
                    <div class="item-container">
                        <div class="item item-dashboard">
                            <i class="fa-solid fa-house-chimney text-white"></i>
                            <h5><a class="text-white" style="width: 100%; display: block;"
                                href="{{URL::to('admin/')}}">Dashboard</a></h5>
                        </div>
                        <div class="item">
                            <div class="drd">
                                <h5  class="drd-toggle">Quan ly san pham</h5>
                                <ul class="drd-menu">
                                    <li><a class="" href="{{URL::to('admin/product/list-product')}}">Danh sach san pham</a></li>
                                    <li><a class="" href="{{URL::to('admin/product/add')}}">Them san pham</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-xl-10 db-content">
                    <h1>@yield('content')</h1>

                    <div class="footer-content">
                        <h5 class="text-white">TStore</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script>
        let dropDownBtn = document.getElementById("drd-toggle");
        let dropMenu = document.getElementById("drd-menu");
        dropDownBtn.onclick = function(){
            showMenu();
        }
        function showMenu(){
            dropMenu.style.display = 'block';
        }
        
    </script> --}}
</body>
</html>