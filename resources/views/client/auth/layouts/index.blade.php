<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('style')

</head>
<body>
    
    <div class="register-section" style="margin-top: 2rem; color: #fff;">
        
        <div class="container" style="max-width: 900px; margin-top: 10%;">
            <div class="row">
                <div class="form-section col-xl-7">
                    @yield('form')
                </div>
                <div class="col-xl-4 flex align-items-center" style="">
                    <img src="{{asset('images/logo/TStore-logo.png')}}" alt="Logo">
                </div>
            </div>
        </div>
        
    </div>

</body>
</html>