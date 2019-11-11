<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventar</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Super Admin<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active"><a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a></li>
                <li>
                    <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Invoice</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Jobs</span><span class="label label-info pull-right">NEW</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="allJobs.html">All Jobs</a></li>
                        <li><a href="newrecord.html">New Order</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="allusers.html">All Users</a></li>
                        <li><a href="newUsers.html">Add New Customer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Messages </span><span class="label label-warning pull-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mail_compose.html">Compose email</a></li>
                        <li><a href="mailbox.html">Inbox</a></li>
                        <li><a href="mail_detail.html">Sent</a></li>   
                        <li><a href="email_template.html">Draft</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-clock-o"></i> <span class="nav-label">To-do-list</span></a>
                </li>
                 <li>
                    <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="#">Dont Knw What to Put Here ooo Lool</a></li>
                        <li><a href="#">Dont Knw What to Put Here ooo Lool</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome back UserName.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
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
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
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
                            <a class="btn btn-block btn-primary compose-mail" href="mail_compose.html">Compose Mail</a>
                            <div class="space-25"></div>
                            <h5>Folders</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="mailbox.html"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">16</span> </a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-certificate"></i> Important</a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right">2</span></a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-trash-o"></i> Trash</a></li>
                            </ul>
                            <h5>Categories</h5>
                            <ul class="category-list" style="padding: 0">
                                <li><a href="#"> <i class="fa fa-circle text-navy"></i> Work </a></li>
                                <li><a href="#"> <i class="fa fa-circle text-danger"></i> Documents</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-primary"></i> Social</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-info"></i> Advertising</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
                            </ul>

                            <h5 class="tag-title">Labels</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-tag"></i> Family</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Work</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Home</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Children</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Holidays</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Music</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Photography</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Film</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="index.html" class="pull-right mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                    Inbox (16)
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                    </div>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                </div>
            </div>
                <div class="mail-box">

                <table class="table table-hover table-mail">
                <tbody>
                <tr class="unread">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                    <td class=""><i class="fa fa-paperclip"></i></td>
                    <td class="text-right mail-date">6.10 AM</td>
                </tr>
                <tr class="unread">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks" checked>
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Jack Nowak</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">8.22 PM</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Facebook</a> <span class="label label-warning pull-right">Clients</span> </td>
                    <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jan 16</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Mailchip</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">There are many variations of passages of Lorem Ipsum.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Mar 22</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Alex T.</a> <span class="label label-danger pull-right">Documents</span></td>
                    <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                    <td class=""><i class="fa fa-paperclip"></i></td>
                    <td class="text-right mail-date">December 22</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Monica Ryther</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">The standard chunk of Lorem Ipsum used.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jun 12</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Sandra Derick</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Contrary to popular belief.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">May 28</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Patrick Pertners</a> <span class="label label-info pull-right">Adv</span></td>
                    <td class="mail-subject"><a href="mail_detail.html">If you are going to use a passage of Lorem </a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">May 28</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Michael Fox</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Humour, or non-characteristic words etc.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Dec 9</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Damien Ritz</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Oor Lorem Ipsum is that it has a more-or-less normal.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jun 11</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                    <td class=""><i class="fa fa-paperclip"></i></td>
                    <td class="text-right mail-date">6.10 AM</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Jack Nowak</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">8.22 PM</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Mailchip</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">There are many variations of passages of Lorem Ipsum.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Mar 22</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Alex T.</a> <span class="label label-warning pull-right">Clients</span></td>
                    <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                    <td class=""><i class="fa fa-paperclip"></i></td>
                    <td class="text-right mail-date">December 22</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Monica Ryther</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">The standard chunk of Lorem Ipsum used.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jun 12</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Sandra Derick</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Contrary to popular belief.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">May 28</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Patrick Pertners</a> </td>
                    <td class="mail-subject"><a href="mail_detail.html">If you are going to use a passage of Lorem </a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">May 28</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Michael Fox</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Humour, or non-characteristic words etc.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Dec 9</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <input type="checkbox" class="i-checks">
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Damien Ritz</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Oor Lorem Ipsum is that it has a more-or-less normal.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jun 11</td>
                </tr>
                </tbody>
                </table>


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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>
</html>
