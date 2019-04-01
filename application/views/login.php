<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<html>
<head>
    <title>Admin HM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--JQUERY-->
    <script src="<?php echo base_url('asset/js/jquery.js')  ?>"></script>
    <!--POPPER-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--BOOTSTRAP JAVA SCRIPT-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        body {
            background: url('<?php echo base_url('asset/img/background7.png')?>') fixed;
            background-size: cover;
        }
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
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
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
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
		@media screen and (max-width: 768px) {
			.navbar{
				background-color:rgb(233,233,233);
			}
		}

    </style>
</head>
<script>
    $(document).ready(function () {
    });
</script>
<body class="text-center">
    <div style="margin-bottom: 50px">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#" style="width: 155px;padding: 0px">
                <img src="<?php echo base_url('asset/img/logo2.png')?>" width="150px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarToggler" >
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 lead">
                    Official Admin Website History Maker Retreat 2018
                </ul>
            </div>
        </nav>
    </div>

    <div class="container-fluid" style="padding: 2%;">
        <h1>Welcome to Admin History Maker</h1>
        <form class="form-signin" id="singin" action="#" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input name="email" type="text" id="email" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
            <p class="mt-5 mb-3 text-white" >&copy; PD iSTTS 2018</p>
        </form>
    </div>
</body>
</html>
