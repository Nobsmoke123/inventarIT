<?php
session_start();

if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] ==  true)){
    header("Location: index.html");
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation"> 
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">
                                            <?php echo $_SESSION["username"]; ?>
                                        </strong>
                                    </span>
                                    <span class="text-muted text-xs block">
                                        Super Admin <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.php">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                            <!--Add Image Logo in here  -->
                            <!-- <img src="" alt=""> -->
                        </div>
                    </li>
                    <li>
                        <a href="dashboard.php">
                            <i class="fa fa-th-large"></i>
                            <span class="nav-label">Dashboards</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="#">
                            <i class="fa fa-bar-chart-o"></i>
                            <span class="nav-label">Jobs</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="allJobs.php">All Jobs</a></li>
                            <li><a href="addJobs.php">Add New Job</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">Users</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="allClients.php">All Users</a></li>
                            <li><a href="addClient.php">Add New Customer</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html">
                            <i class="fa fa-envelope"></i>
                            <span class="nav-label">Messages</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="compose_mail.php">Compose email</a></li>
                            <li><a href="inbox.php">Inbox</a></li>
                            <li><a href="outbox.php">Sent</a></li>
                            <li><a href="sms.php">SMS</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-clock-o"></i>
                            <span class="nav-label">To-do list</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="addTodo.php">Add To-do Item</a></li>
                            <li><a href="todolist.php"> View all To-do Items</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="#">Profile Settings</a></li>
                            <li><a href="#">System Settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">
                                Welcome back <?php echo $_SESSION["username"] ?>
                            </span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wrapper wrapper-content">
                <!--main Content here-->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content mailbox-content">
                                    <div class="file-manager">
                                        <a class="btn btn-block btn-primary compose-mail" href="compose_mail.php">Compose Mail</a>
                                        <div class="space-25"></div>
                                        <h5>Folders</h5>
                                        <ul class="folder-list m-b-md" style="padding: 0">
                                            <li>
                                                <a href="inbox.php">
                                                    <i class="fa fa-inbox "></i> 
                                                    Inbox 
                                                    <span class="label label-warning pull-right">16</span> 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="outbox.php">
                                                    <i class="fa fa-envelope-o"></i> 
                                                    Sent Mail 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="draft.php">
                                                    <i class="fa fa-file-text-o"></i> 
                                                    Drafts 
                                                    <span class="label label-danger pull-right">2</span>    
                                                </a>
                                            </li>
                                            <li>
                                                <a href="trash.php">
                                                    <i class="fa fa-trash-o"></i> 
                                                    Trash
                                                </a>
                                            </li>
                                        </ul>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 animated fadeInRight">
                            <div class="mail-box-header">
                                <div class="pull-right tooltip-demo">
                                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                                    <a href="mailbox.html" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                                </div>
                                <h2>
                                    Compse mail
                                </h2>
                            </div>

                            <div class="mail-box">
                                <div class="mail-body">

                                <form class="form-horizontal" method="get">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">To:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="alex.smith@corporat.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Subject:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="mail-text h-200">

                            <div class="summernote">
                                <h3>Hello Jonathan! </h3>
                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                <br/>
                                <br/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="mail-body text-right tooltip-demo">
                            <a href="mailbox.html" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</a>
                            <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                            <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="footer">
                    <div class="pull-right">
                        Designed By <strong>Pedro</strong> The Boss
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2017
                    </div>
                </div>
            </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.summernote').summernote();
        });
    </script>
</body>
</html>
