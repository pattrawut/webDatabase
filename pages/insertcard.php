
<?php
include('includes/header.php');


if(isset($_POST['number']))
{
    //$uid = $_POST['uid'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $seller = $_POST['sellerno'];
    $product = $_POST['product'];
    $price = $_POST['price'];

  $link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");



$query = "INSERT INTO cardstatement(date,sellerno,product,price,number,uid) VALUES ('".$date."','".$seller."','".$product."','".$price."','".$number."','".$uid."')";

$result = mysqli_query($link, $query) or die("Data not found");

  if($uid == 1)
    $countrow = mysqli_query($link,"SELECT * FROM cardstatement");
else
    $countrow = mysqli_query($link,"SELECT * FROM cardstatement WHERE uid ='".$uid."'");

$num_rows = mysqli_num_rows($countrow);

//$result->close();
$countrow->close();
$link->close();
header("location:cardstate.php?id=".$num_rows);
}

?>




        <div id="page-wrapper" style="min-height: 355px;">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header" style="color:#0066CC">Credit Card Statement</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

			<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Credit Card Transaction
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" name="card" action="insertcard.php" method="post">
                                        <!--
                                        <div class="form-group">
                                            <label>Transaction No.</label>
                                            <input  name="transno" class="form-control" placeholder="Enter text"  value="" disabled>
                                        </div>

										<label>User ID No.</label>
                                        <div class="form-group input-group">
											<span class="input-group-addon">@</span>
                                            <input name="uid" type="text" class="form-control" placeholder="User ####" value="" disabled>
                                        </div>
                                        -->
										<div class="form-group">
                                            <label>Credit Card No.</label>
                                            <input name="number" class="form-control" placeholder="Enter Creditcard No."  value="">
                                        </div>

										<div class="form-group">
                                            <label>Date</label>
                                            <input name="date" type="date" class="form-control" placeholder="Enter Date" value="">
                                        </div>

										<div class="form-group">
                                            <label>Seller No.</label>
                                            <input id="sellerno" name="sellerno" class="form-control" placeholder="Enter Seller No." value="">
                                        </div>

										<div class="form-group">
                                            <label>Product</label>
                                            <input id="product" name="product" class="form-control" placeholder="Enter Product" value="">
                                        </div>

                                        <label>Price</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input id="price" name="price" type="text" class="form-control"   value="">
                                            <span class="input-group-addon">.00</span>
                                        </div>
										<table width='100%'><tr>
                                        <td width ='25%'></td>

										<td width ='50%'>
												<button id="save"  name = "save" type="submit" class="btn btn-success btn-circle btn-lg"><i class="fa fa-save"></i></button>
												<button type="button" class="btn btn-danger btn-circle btn-lg" onClick="location.href='cardstate.php'" ><i class="fa fa-remove"></i></button>
										<td  width ='25%'></td>
										</tr></table>

                                    </form>

									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include('includes/footer.php');?>
