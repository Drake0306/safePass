<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-SafePass System</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    @include('script&css')

    <!-- Bootstrap core CSS -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>


    <!-- Custom styles for this template -->
    <!-- <link href="signin.css" rel="stylesheet"> -->
</head>

<body class="text-center">
        <div style="display: none" id="preloader"></div>
    <main class="form-signin">
        <form method="POST" action="{{url('/log_in')}}">
            @csrf
            <img class="mb-4" src="{{url('/assets/images/Indian-Oil-Logo.png')}}" alt="" width="160" height="100">
            <h1 class="h3 mb-3 fw-normal">Please sign in <span class="badge text-dark" style="font-size: 13px">‟Welcom to e-SafePass System”</span></h1>

            <div class="form-floating">
                <input type="text" name="user_id" class="form-control" id="floatingInput" placeholder="ID****">
                <label for="floatingInput">User ID</label>
                @if(@$error == 1)
                <small id="helpId" style="color:red" class="form-text">Wrong Password or User Id</small>
                @endif
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" minlength="6" name="password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
                @if(@$error == 1)
                <small id="helpId" style="color:red" class="form-text">Wrong Password or User Id</small>
                @endif
            </div>

            <div class="checkbox mb-3">
                <!-- <label>
                    <input type="checkbox" name="remember" value="remember-me"> Remember me
                </label> -->
            </div>
            <button class="w-100 btn btn-lg btn" style="background-color: #F79646;color: #FFFFFF" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–{{date('Y')}} Comsys IT</p>
        </form>
    </main>



</body>
<script>
    $('#change_no').click(function () {
        var value_data_one = $('#value_data_one').val();
        if (value_data_one == 0) {
            $('#text_change').html('GES');
            $('#value_data_one').val(1);

        } else {
            $('#text_change').html('gate entry system');
            $('#value_data_one').val(0);
        }
    });
</script>

</html>