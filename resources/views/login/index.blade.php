
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('template/img/favicon.png')}}">

    <title>Badan Pengawas Pemilu Provinsi Sumatera Utara></title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.jpg')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('template/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('template/js/html5shiv.js')}}"></script>
    <script src="{{asset('template/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(template/img/login-register.jpg) no-repeat center center; background-size: cover;">
    <br><br><br><br><br><br>
        <div class="auth-box p-4 bg-white rounded">
            <div class="container">
                <form class="form-signin" action="{{route('cek_login')}}" method="POST"> @csrf
                <h2 class="form-signin-heading">sign in now</h2>
                <div class="login-wrap">
                    @if(session('error'))
                    <div class="col p-0">
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    </div>
                  @endif
                  @if(session('success'))
                    <div class="col p-0">
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    </div>
                  @endif
                  <div class="form-group text-center">
                      <img src="{{asset('images/logo.jpg')}}"  alt="" height="100px">
                  </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email" autofocus name="email" require>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" require>
                        </div>

                        <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>


                    </div>


                </form>
                <br><br><br><br><br><br><br><br><br><br><br><br>
            </div>

        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="{{asset('template/js/jquery.js')}}"></script>
        <script src="{{asset('template/js/bootstrap.min.js')}}"></script>


</body>

</html>
