
<?php include('includes/header.php');
error_reporting(E_ALL);
ini_set('display_errors', 'On');?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Card Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="dataTable_wrapper" ng-app="myApp" ng-controller="cardCtrl">
                              <!--  -->

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Number</th>
                                    <th>Issuer</th>
                                    <th>Exp</th>
                                    <th>Limit</th>
                                    <th>Currency</th>
                                </tr>
                            </thead>

                      <tr>
                    <?php

                                              include("cardinfophp.php");

                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    echo "<tr><td>".$row['firstname']. " ".$row['lastname']."</td><td>".$row['number']."</td><td>".$row['issuer']."</td><td>".$row['exp']."</td><td>".$row['limit']."</td><td>".$row['currency']."</td></tr>";
                                                }

                                                mysqli_close($link); ?>

                      </tr>
      </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

                <!-- /.col-lg-6 -->
            </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php include('includes/footer.php');?>
