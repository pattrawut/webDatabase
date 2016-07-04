<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
            </li>
            <li>
                <a href="person.php"><i class="fa fa-bar-chart-o fa-fw"></i> Profile</span></a>
            </li>
            <li>
                <a href="cardinfo.php"><i class="fa fa-bar-chart-o fa-fw"></i> Card Info</span></a>
            </li>
            <li>
                <a href="cardinfojs.php"><i class="fa fa-bar-chart-o fa-fw"></i> Card Info (Angular)</span></a>
            </li>
            <li>
                <a href="cardstate.php"><i class="fa fa-edit fa-fw"></i> Card Statement</a>
            </li>
            <li>
                <a href="listtransactions.php"><i class="fa fa-wrench fa-fw"></i> Transactions</span></a>
            </li>
            <?php if($uid ==1){
                    print "<li>";
                    print "<a href=\"searchnews.php\"><i class=\"fa fa-sitemap fa-fw\"></i> Search News</span></a>";
                    print "</li>";
                }
            ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
