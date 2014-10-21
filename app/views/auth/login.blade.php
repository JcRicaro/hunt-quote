<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> HuntQuote - Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    {{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css') }}

    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    

    {{ HTML::style('assets/admin-lte/css/AdminLTE.css') }}

    <style>
        html,
        body,
        .bg-swag {
            background: #1f1f1f;
        }
        .bg-orange {
            background-color: #35DAA8 !important;
        }
        .header {
            background-color: #35DAA8 !important;
        }
        .alert {
            margin-left: 0;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-swag">

    <div class="form-box" id="login-box">
        <div class="header">HuntQuote Dashboard</div>
        <form action="{{ route('auth.login') }}" method="post">
            <div class="body bg-gray">
                @if( Session::has('error') )
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>          
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Remember me
                </div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-orange btn-block">Login</button>
            </div>
        </form>
    </div> 

    {{ HTML::script('vendor/jquery/dist/jquery.min.js') }}
    {{ HTML::script('vendor/bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('assets/admin-lte/js/AdminLTE/app.js') }}

</body>
</html>