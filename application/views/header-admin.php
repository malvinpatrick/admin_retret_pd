<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--JQUERY-->
        <script src="<?php echo base_url('asset/js/jquery.js')  ?>"></script>
        <!--POPPER-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!--BOOTSTRAP JAVA SCRIPT-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!--GOOGLE MATERIAL ICON-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script>
            $(document).ready(function () {
                var heightNavbar1 = $("#navbar").height();

                heightNavbar1 += 45;
                $("#container-navbar").css("margin-bottom",heightNavbar1+ "px");
            });
        </script>
    </head>
    <body>
    <div class="container-fluid" style="padding: 0px;" id="container-navbar">
        <div class="container-fluid fixed-top" style="padding: 0px;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
                <a class="navbar-brand" href="#"><img src="<?php echo base_url('asset/img/logo.png')?>" width="150px"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class='nav-item'><a class='nav-link' href='<?php echo base_url('HistoryMaker/Pendaftaran')?>'>Pendaftaran</a></li>
                        <li class='nav-item'><a class='nav-link' href='<?php echo base_url('HistoryMaker/Pelunasan')?>'>Pelunasan</a></li>
                        <li class='nav-item'><a class='nav-link' href='<?php echo base_url('HistoryMaker/RegistrasiUlang')?>'>Registrasi Ulang</a></li>
                    </ul>

                    <a href="<?php echo base_url('HistoryMaker/logout')?>" class="my-2 my-sm-0 text-success">Logout</a>
                </div>
            </nav>
        </div>
    </div>


    </body>
</html>