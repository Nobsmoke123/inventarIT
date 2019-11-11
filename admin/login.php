<?php
    session_start();
    require_once('./php_scripts/flashMessage.php');
    $flashMessage = new FlashMessages();

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./fonts/fonts.css">
    <link rel="stylesheet" href="./css/materialIcons.css">
    <link rel="stylesheet" href="./css/materialize.min.css">
    <link rel="stylesheet" href="./css/flashMessage.css">
    <link rel="icon" href="img/logo.png">
    <style>
        body{
            background-image:url('img/laptop4.jpeg'), linear-gradient(#B7B7B7, #B2B2B2);
            background-attachment:fixed;
            background-position:left center; 
            background-size:cover;
            background-repeat:no-repeat;
        }

        &:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(to bottom right,#222,#222);
            opacity: .1; 
        }

        #card{
            background:transparent !important;
            color:#fff;
        }

        #card input{
            color:#fff !important;
        }
        .card-title h3{
            color:#fff !important;
        }

        .input-field>label {
            color: #fff;
        }
    </style>
</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col l8 offset-l4 col m6 offset-m2 col s12">
                <?php if($flashMessage->checkFlash("LoginError")): ?> 
                    <div id="snackbar" class="show">
                        <?php
                         echo $flashMessage->flash("LoginError");
                         $flashMessage->clearFlash("LoginError"); 
                         ?>
                    </div>
                <?php endif; ?>

                <div class="valign-wrapper" style="height:100%;position:absolute;">
                    <form action="./index.php" method="POST">
                        <div class="card card-panel hoverable" id="card">
                            <div class="card-image"> 
                            </div>
                            <div class="card-title">
                                <h3 class="center-align">Admin Login</h3>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">face</i>
                                <input type="text" id="username" name="username">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" id="password" name="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field center-align">
                                <input type="hidden" name="type" value="0">
                                <button type="submit" name="submit" class="btn waves waves-button-input waves-effect waves-light green">
                                    <i class="material-icons right">send</i>Login
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/materialize.min.js"></script>
    
</body>

</html>