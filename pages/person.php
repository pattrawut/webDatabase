<?php include('includes/header.php');?>
<?php


$query = "SELECT * FROM personinfo";
$result = mysqli_query($link,$query);
 ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Person Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12" ng-app="myApp" ng-controller="personCtrl">
                  Showing Total List: {{ contents.length }}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="dataTable_wrapper" >

                              <table style="margin-bottom: 25px" ng-repeat="x in contents" ng-if="<?php echo $uid;?> == x.id || <?php echo $uid;?> == 1">
                                <tr>
                                  <td rowspan="5" style="padding-right: 20px;">  <img src="img/user-image.jpg" style="width:100px;height:100px;"></td>
                                  <th class="pad"> {{xfirstname}}</th>

                                </tr>
                                <tr>
                                  <th class="pad">Name: </th>
                                  <td>{{x.firstname}} {{ x.lastname }}</td>
                                </tr>
                                <tr>
                                  <th class="pad">Location</th>
                                  <td>{{ x.city }} {{ x.country }}</td>
                                </tr>
                                <tr>
                                  <th class="pad">Number</th>
                                  <td>{{x.telephone}}</td>
                                </tr>
                                <tr>
                                  <th class="pad">Email</th>
                                  <td>{{ x.email  }}</td>
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php include('includes/footer.php');?>
