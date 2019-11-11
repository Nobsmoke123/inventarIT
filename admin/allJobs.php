<?php
session_start();

if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] ==  true)){
    header("Location: login.php");
}

require_once('./php_scripts/connection.php');
require_once('./php_scripts/queries.php');
require_once('./php_scripts/flashMessage.php');
$flashMessage = new FlashMessages();
$dbcon = new DatabaseConnection;
$connection = $dbcon->connection();

$queries = new Queries($connection);

$jobs = $queries->getAllJobs();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                    <li>
                        <a href="dashboard.php">
                            <i class="fa fa-th-large"></i>
                            <span class="nav-label">Dashboards</span>
                        </a>
                    </li>
                   
                    <li class="active">
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
                            <li><a href="password_reset.php"> Password Settings</a></li>
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
                <!--main Content here-->
                <?php if($flashMessage->checkFlash("Success")): ?>
                    <div id="snackbar" class="show">
                        <?php
                         echo $flashMessage->flash("Success");
                         $flashMessage->clearFlash("Success"); 
                         ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>All Jobs</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">Customers Name</th>
                                                <th class="text-center">Job Title</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Drop In Date &rarr; Pick Up Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i = 0; $i < count($jobs); $i++): ?>
                                                <tr class="gradeX">
                                                    <td class="text-center"><?php echo $jobs[$i]["first_name"]." ".$jobs[$i]["last_name"]; ?></td>
                                                    <td class="text-center"><?php echo $jobs[$i]["job_title"]; ?></td>
                                                    <?php if(strcmp($jobs[$i]["status"],"completed")): ?>
                                                        <td class="btn-warning text-center">
                                                        <?php echo $jobs[$i]["status"]; ?></td>
                                                    <?php else: ?>
                                                        <td class="btn-success text-center">
                                                        <?php echo $jobs[$i]["status"]; ?></td>
                                                    <?php endif; ?>
                                                        
                                                    <td class="text-center"><?php echo $jobs[$i]["dropin_date"]." &rarr; ".$jobs[$i]["pickup_date"]; ?></td>
                                                    <td class="text-center">
														<div class="row">
															<div class="col-sm-6 col-md-6 col-lg-6">
																<a href="#" onclick="addJobDetails(<?php echo $jobs[$i]["id"];?>);" data-toggle="modal" data-target="#myModal">
																	<i class="fa fa-pencil"></i>
																</a>
															</div>
															<div class="col-sm-6 col-md-6 col-lg-6">
																<a href="#" onclick="getJobDetails(<?php echo $jobs[$i]["id"];?>);" data-toggle="modal" data-target="#jobDetails">
																	<i class="fa fa-eye"></i>
																</a>
															</div>
														</div>
                                                    </td>
                                                </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>

								<!--Modal for editing the jobs  -->
								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
                                            <form action="index.php" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="myModalLabel"> Update Job Delivery Time</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Pick Up Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="job_id" value="" id="job_id">
                                                            <input type="date" class="form-control" name="pickup_date" id="edit_pickup_date" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> Job Status </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="status">
                                                                <option value="in progress" selected>In Progress</option>
                                                                <option value="completed">Completed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name="type" value="5">
                                                    <input type="hidden" name="customer_id" value="" id="customer_id">
                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
										</div>
									</div>
								</div>

                                <!-- Modal for viewing the job details-->
								<div class="modal fade" id="jobDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title text-center" id="myModalLabel"> View Job Details </h3>
                                            </div>
                                            <div class="modal-body" style="font-size:18px; font-weight:bold;">
                                                <p>Customer Name: <span id="customer_name"></span></p>
                                                <p>Job Title: <span id="jobTitle"></span></p>
                                                <p>Job Description: <span id="job_desc"></span></p>
                                                <p>Drop-in Date: <span id="dropin_date"></span></p>
                                                <p>Pick-up Date: <span id="pickup_date"></span></p>
                                                <br/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            </div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="footer">
                        <div class="pull-right">
                            Designed By <a href="https://www.codebase.com.ng"><strong>CodeBase Nigeria</strong></a>
                        </div>
                        <div>
                            <strong>Copyright</strong> Invertar &copy; <span id="webyear"></span>
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
    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>
    <script>
        $(document).ready(function(){

            $('#webyear').text(new Date().getFullYear());

            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

        function addJobIdValue(job_id){
            $('#job_id').val(job_id);
            // alert($('#job_id').val());
        }

        function addJobDetails(job_id){
            $.post("index.php",
                {
                    submit: "true",
                    id: job_id,
                    type:6
                },
                function(data, status)
                {
                    // alert("Data: " + data + "\nStatus: " + status);
                    data = JSON.parse(data);
                    // alert(data.first_name);
                    // $('#customer_name').text(data.first_name+" "+data.last_name);
                    // $('#jobTitle').text(data.job_title);
                    // $('#job_desc').text(data.job_description);
                    // $('#status').text(data.status);
                    $('#customer_id').val(data.customer_id);
                    $('#edit_pickup_date').val(data.pickup_date);
                }
            );

            addJobIdValue(job_id);
        }
        
        function getJobDetails(job_id){
            $.post("index.php",
                {
                    submit: "true",
                    id: job_id,
                    type:6
                },
                function(data, status)
                {
                    // alert("Data: " + data + "\nStatus: " + status);
                    data = JSON.parse(data);
                    // alert(data.first_name);
                    $('#customer_name').text(data.first_name+" "+data.last_name);
                    $('#jobTitle').text(data.job_title);
                    $('#job_desc').text(data.job_description);
                    $('#dropin_date').text(data.dropin_date);
                    $('#pickup_date').text(data.pickup_date);
                }
            );
        }
    </script>
</body>
</html>
