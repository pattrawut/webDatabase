<?php include('includes/header.php');

if($uid == 1)
    $query = "SELECT * FROM cardstatement";
else
    $query = "SELECT * FROM cardstatement WHERE uid = '".$uid."'";


$countrow = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($countrow);

if($uid == 1)
    $query = "SELECT * FROM cardstatement WHERE transno='".$current."'";
else{
    $offset = $current-1;
    $query = "SELECT * FROM cardstatement WHERE uid = '".$uid."' LIMIT 1 OFFSET ".$offset;
}

$result = mysqli_query($link, $query) or die("Data not found");


$row=mysqli_fetch_array($result);


if($current>1){
    $newid = $current-1;
$prevbtn = "cardstate.php?id=".$newid;}
else
$prevbtn = "cardstate.php?id=".$current;

if($current<$num_rows){
    $newid =$current+1;
$nextbtn = "cardstate.php?id=".$newid;}
else
$nextbtn = "cardstate.php?id=".$current;
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
                                    <form role="form" name="card" action="savecard.php" method="post">

                                        <div class="form-group">
                                            <label>Transaction No.</label>
                                            <input  name="transno" class="form-control" placeholder="Enter text" readonly value="<?php echo $row['transno'];?>">
                                        </div>

                                        <label>User ID No.</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="uid" type="text" class="form-control" placeholder="User ####" readonly value="<?php echo $row['uid']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Credit Card No.</label>
                                            <input class="form-control" placeholder="Enter Creditcard No." readonly  value="<?php echo $row['number']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" placeholder="Enter Date" readonly value="<?php echo $row['date']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Seller No.</label>
                                            <input id="sellerno" name="sellerno" class="form-control" placeholder="Enter Seller No." readonly  value="<?php echo $row['sellerno']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Product</label>
                                            <input id="product" name="product" class="form-control" placeholder="Enter Product" readonly  value="<?php echo $row['product']; ?>">
                                        </div>

                                        <label>Price</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input id="price" name="price" type="text" class="form-control" readonly  value="<?php echo $row['price']; ?>">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <table width='100%'><tr>
                                        <td width ='25%'><button type="button" class="btn btn-default btn-circle btn-lg"  onClick="location.href='<?php echo $prevbtn; ?>'"><i class="fa fa-angle-left" ></i></button></td>

                                        <td width ='50%'>
                                                <button type="button" class="btn btn-primary btn-circle btn-lg" onClick="editbox()"><i class="fa fa-edit"></i></button>
                                                <button id="save"  name = "save" type="submit" class="btn btn-success btn-circle btn-lg" disabled><i class="fa fa-save"></i></button>
                                                <button type="button" class="btn btn-warning btn-circle btn-lg" onClick="location.href='insertcard.php'" ><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-danger btn-circle btn-lg" onClick="location.href='deletestat.php?id=<?php echo $row['transno']; ?>'" ><i class="fa fa-times"></i></button>
                                        </td>
                                        <td  width ='25%'><button type="button" class="btn btn-default btn-circle btn-lg" onClick="location.href='<?php echo $nextbtn; ?>'"><i class="fa fa-angle-right"></i></button></td>
                                        </tr></table>

                                    </form>
                                    <?php
                                            $result->close();
                                            $link->close();?>
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
