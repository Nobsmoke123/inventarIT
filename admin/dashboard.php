<?php
session_start();

if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] ==  true)){
    header("Location: login.php");
}
require("./php_scripts/connection.php");
require("./php_scripts/queries.php");
require("./php_scripts/smsAgent.php");

$dbcon = new DatabaseConnection;
$connection = $dbcon->connection();

$queries    = new Queries($connection);
$sms = new SmsAgent($connection,$queries);

$jobs_count       = $queries->getTableCount("jobs");
$customers_count    = $queries->getTableCount("customers");

$allJobs    = $queries->getAllPendingJobs();

$current = $sms->getBalance();
// print_r($balance);
// print_r($sms->getBalance());



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inventar | Admin Dashboard </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/flashMessage.css">
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
                    <li class="active">
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
                    <li>
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
                            <li><a href="sent_sms.php">Sent SMS</a></li>
                            <li><a href="sms.php">SMS</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="password_reset.php">Password Settings</a></li>
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
                        
                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wrapper wrapper-content">
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">New</span>
                                <h5>Enquiries</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">275,800</h1>
                                <small>New Enquiries</small>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">All Jobs</span>
                                <h5>Jobs</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $jobs_count; ?></h1>
                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>Total jobs Registered</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">All Users</span>
                                <h5>Customers</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"> <?php echo $customers_count; ?></h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                                <small>All Customers</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right"> Low value </span>
                                <h5> SMS Balance</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"> <?php echo $current->balance; ?> </h1>
                                 <div class="stat-percent font-bold text-danger">
                                     <?php
                                        $result =  ($current->balance / 1000) * 100;

                                        if($result > 50){
                                               echo $result." <i class='fa fa-level-up'></i>"; 
                                        }else{
                                                echo $result." <i class='fa fa-level-down'></i>";
                                        }
                                     
                                      ?> 
                                     
                                     </div> 
                                <small>SMS Units</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Messages</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><i class="fa fa-envelope-o"></i> New messages</h3>
                                <small><i class="fa fa-tim"></i> You have 22 new messages </small>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">1m ago</small>
                                            <strong>Monica Smith</strong>
                                            <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">2m ago</small>
                                            <strong>Jogn Angel</strong>
                                            <div>There are many variations of passages of Lorem Ipsum available</div>
                                            <small class="text-muted">Today 2:23 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Current Pending Jobs</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Job</th>
                                            <th>Status</th>
                                            <th>DropIn Date</th>
                                            <th>pickUp Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php for($i = 0; $i < count($allJobs); $i++): ?>
                                            <tr>
                                                <td><?php echo $allJobs[$i]["first_name"]."&nbsp;".$allJobs[$i]["last_name"]; ?></td>
                                                <td><?php echo $allJobs[$i]["job_title"]; ?></td>
                                                <td><?php echo $allJobs[$i]["status"]; ?></td>
                                                
                                                <td><i class="fa fa-clock-o">&nbsp;&nbsp;</i><?php echo $allJobs[$i]["dropin_date"];?></td>
                                                <td><i class="fa fa-clock-o">&nbsp;&nbsp;</i><?php echo $allJobs[$i]["pickup_date"];?></td>
                                            </tr>
                                        <?php endfor; ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="pull-right">
                            Designed By <a href="https://www.codebase.com.ng"><strong>CodeBase Nigeria</strong></a>
                        </div>
                        <div>
                            <strong>Copyright</strong> Invertar &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
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

            <script>
                $(document).ready(function() {
                    $('.chart').easyPieChart({
                        barColor: '#f8ac59',
                        //                scaleColor: false,
                        scaleLength: 5,
                        lineWidth: 4,
                        size: 80
                    });

                    $('.chart2').easyPieChart({
                        barColor: '#1c84c6',
                        //                scaleColor: false,
                        scaleLength: 5,
                        lineWidth: 4,
                        size: 80
                    });

                    var data2 = [
                        [gd(2012, 1, 1), 7],
                        [gd(2012, 1, 2), 6],
                        [gd(2012, 1, 3), 4],
                        [gd(2012, 1, 4), 8],
                        [gd(2012, 1, 5), 9],
                        [gd(2012, 1, 6), 7],
                        [gd(2012, 1, 7), 5],
                        [gd(2012, 1, 8), 4],
                        [gd(2012, 1, 9), 7],
                        [gd(2012, 1, 10), 8],
                        [gd(2012, 1, 11), 9],
                        [gd(2012, 1, 12), 6],
                        [gd(2012, 1, 13), 4],
                        [gd(2012, 1, 14), 5],
                        [gd(2012, 1, 15), 11],
                        [gd(2012, 1, 16), 8],
                        [gd(2012, 1, 17), 8],
                        [gd(2012, 1, 18), 11],
                        [gd(2012, 1, 19), 11],
                        [gd(2012, 1, 20), 6],
                        [gd(2012, 1, 21), 6],
                        [gd(2012, 1, 22), 8],
                        [gd(2012, 1, 23), 11],
                        [gd(2012, 1, 24), 13],
                        [gd(2012, 1, 25), 7],
                        [gd(2012, 1, 26), 9],
                        [gd(2012, 1, 27), 9],
                        [gd(2012, 1, 28), 8],
                        [gd(2012, 1, 29), 5],
                        [gd(2012, 1, 30), 8],
                        [gd(2012, 1, 31), 25]
                    ];

                    var data3 = [
                        [gd(2012, 1, 1), 600],
                        [gd(2012, 1, 2), 500],
                        [gd(2012, 1, 3), 600],
                        [gd(2012, 1, 4), 700],
                        [gd(2012, 1, 5), 500],
                        [gd(2012, 1, 6), 456],
                        [gd(2012, 1, 7), 800],
                        [gd(2012, 1, 8), 589],
                        [gd(2012, 1, 9), 467],
                        [gd(2012, 1, 10), 876],
                        [gd(2012, 1, 11), 689],
                        [gd(2012, 1, 12), 700],
                        [gd(2012, 1, 13), 500],
                        [gd(2012, 1, 14), 600],
                        [gd(2012, 1, 15), 700],
                        [gd(2012, 1, 16), 786],
                        [gd(2012, 1, 17), 345],
                        [gd(2012, 1, 18), 888],
                        [gd(2012, 1, 19), 888],
                        [gd(2012, 1, 20), 888],
                        [gd(2012, 1, 21), 987],
                        [gd(2012, 1, 22), 444],
                        [gd(2012, 1, 23), 999],
                        [gd(2012, 1, 24), 567],
                        [gd(2012, 1, 25), 786],
                        [gd(2012, 1, 26), 666],
                        [gd(2012, 1, 27), 888],
                        [gd(2012, 1, 28), 900],
                        [gd(2012, 1, 29), 178],
                        [gd(2012, 1, 30), 555],
                        [gd(2012, 1, 31), 993]
                    ];


                    var dataset = [{
                        label: "Number of orders",
                        data: data3,
                        color: "#1ab394",
                        bars: {
                            show: true,
                            align: "center",
                            barWidth: 24 * 60 * 60 * 600,
                            lineWidth: 0
                        }

                    }, {
                        label: "Payments",
                        data: data2,
                        yaxis: 2,
                        color: "#1C84C6",
                        lines: {
                            lineWidth: 1,
                            show: true,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 0.2
                                }, {
                                    opacity: 0.4
                                }]
                            }
                        },
                        splines: {
                            show: false,
                            tension: 0.6,
                            lineWidth: 1,
                            fill: 0.1
                        },
                    }];


                    var options = {
                        xaxis: {
                            mode: "time",
                            tickSize: [3, "day"],
                            tickLength: 0,
                            axisLabel: "Date",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: 'Arial',
                            axisLabelPadding: 10,
                            color: "#d5d5d5"
                        },
                        yaxes: [{
                            position: "left",
                            max: 1070,
                            color: "#d5d5d5",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: 'Arial',
                            axisLabelPadding: 3
                        }, {
                            position: "right",
                            clolor: "#d5d5d5",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: ' Arial',
                            axisLabelPadding: 67
                        }],
                        legend: {
                            noColumns: 1,
                            labelBoxBorderColor: "#000000",
                            position: "nw"
                        },
                        grid: {
                            hoverable: false,
                            borderWidth: 0
                        }
                    };

                    function gd(year, month, day) {
                        return new Date(year, month - 1, day).getTime();
                    }

                    var previousPoint = null,
                        previousLabel = null;

                    $.plot($("#flot-dashboard-chart"), dataset, options);

                    var mapData = {
                        "US": 298,
                        "SA": 200,
                        "DE": 220,
                        "FR": 540,
                        "CN": 120,
                        "AU": 760,
                        "BR": 550,
                        "IN": 200,
                        "GB": 120,
                    };

                    $('#world-map').vectorMap({
                        map: 'world_mill_en',
                        backgroundColor: "transparent",
                        regionStyle: {
                            initial: {
                                fill: '#e4e4e4',
                                "fill-opacity": 0.9,
                                stroke: 'none',
                                "stroke-width": 0,
                                "stroke-opacity": 0
                            }
                        },

                        series: {
                            regions: [{
                                values: mapData,
                                scale: ["#1ab394", "#22d6b1"],
                                normalizeFunction: 'polynomial'
                            }]
                        },
                    });
                });
            </script>

            <script>
                {
                    return new Date(year, month - 1, day).getTime();
                }
                var previousPoint = null,
                    previousLabel = null;
                $.plot($("#flot-dashboard-chart"), dataset, options);
                var mapData = {
                    "US": 298,
                    "SA": 200,
                    "DE": 220,
                    "FR": 540,
                    "CN": 120,
                    "AU": 760,
                    "BR": 550,
                    "IN": 200,
                    "GB": 120,
                };
                $('#world-map').vectorMap({
                    map: 'world_mill_en',
                    backgroundColor: "transparent",
                    regionStyle: {
                        initial: {
                            fill: '#e4e4e4',
                            "fill-opacity": 0.9,
                            stroke: 'none',
                            "stroke-width": 0,
                            "stroke-opacity": 0
                        }
                    },
                    series: {
                        regions: [{
                            values: mapData,
                            scale: ["#1ab394", "#22d6b1"],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                });
            </script>
</body>

</html>