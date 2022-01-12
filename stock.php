<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, my admin design, my admin dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="My Admin is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>My Admin Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/myadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                        class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="dashboard.html"><i
                            class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">My Admin</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs hidden-lg waves-effect waves-light"><i
                                class="ti-arrow-circle-left ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="ti-search"></i></a>
                        </form>
                    </li>
                    <li>
                    <?php
                        include("auth.php");
                        echo "<a class='profile-pic' href='#'> <img src='images/users/user.png' alt='user-img' width='36' class='img-circle'><b class='hidden-xs'>$username</b> </a>";

                    ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div class="navbar-default sidebar nicescroll" role="navigation">
            <div class="sidebar-nav navbar-collapse ">
            <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i> </button>
                            </span>
                        </div>
                    </li>
                    <li>
                        <a href="main-page.php" class="waves-effect"><i class="glyphicon glyphicon-fire fa-fw"></i>
                        部門管理</a>
                    </li>
                    <li>
                        <a href="stock.php" class="waves-effect"><i class="ti-layout fa-fw"></i> 庫存管理</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">庫存管理</h4>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <?php
                                if (isset($_REQUEST['ProdId'])) {
                                    $ProdId = $_REQUEST['ProdId'];
                                    $NowStock = $_REQUEST['NowStock'];
                                    
                                    echo "<form action=stock.php?tmp=2&NowStock=$NowStock&ProdId=$ProdId method=post>";
            
                                    echo "<div class='mb-3'>
                                            <label for='exampleFormControlInput1' class='form-label'>產品代號</label>
                                            <input type='text' class='form-control' name=deptid id='deptid' placeholder='請輸入產品代號' value=$ProdId>
                                            </div>
                                            <div class='mb-3'>
                                            <label for='exampleFormControlInput1' class='form-label'>進貨數量</label>
                                            <input type='text' class='form-control' name=Stock id='Stock' placeholder='請輸入進貨數量' >
                                            </div>";
                                    echo " <div class='col-auto'>
                                            <button type='submit' class='btn btn-primary mb-3'>確定</button>           
                                            <button type='reset' class='btn btn-primary mb-3'>重製</button>
                                                                    
                                            </div>";
                                    echo "</form>";
                
                                }
                                if (isset($_REQUEST['tmp'])) {
                                    $tmp =$_REQUEST['tmp'];
                                    switch ($tmp) {
                                        case '2':
                                            // $ProdId=$_REQUEST['ProdId'];
                                            $Stock=$_REQUEST['Stock'];
                                            $NowStock =$_GET['NowStock'];
                                            $Purchase = $Stock+$NowStock;
                                            $sql="update inv 
                                            set ProdId='$ProdId',
                                                Stock='$Purchase'
                                            where ProdId='$ProdId'";
                                            include("connectdb.php");
                                            include('dbutil.php');
                                            execute_sql($sql);

                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }
                                }

                            ?>
                            <h3 class="box-title">庫存</h3>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <div>
                                        <tr>
                                            <th>產品編號</th>
                                            <th>目前存量</th>
                                            <th>安全存量</th>
                                            <th>進貨</th>
                                    
                                        </tr>
                                    </div>
                
                                    <tbody>
                                        <?php 
                                            include("connectdb.php");
                                            $sql = "SELECT ProdId,Stock,SafeStock FROM inv";
                                            $result =$connect->query($sql);
                                            
                                            /* fetch associative array */
                                            while ($row = $result->fetch_assoc()) {
                                        
                                                $ProdId=$row['ProdId'];
                                                $Stock=$row['Stock'];
                                                $SafeStock=$row['SafeStock'];
                                                echo "<tr><TD>$ProdId<td> $Stock<TD>$SafeStock";    
                                                echo "<TD><a href=stock.php?check=1&ProdId=$ProdId&NowStock=$Stock><button class='btn btn-success' type='button' ><i class='ti-check'></i></button></a>";                      
                                            } 
                                                echo "</table>" ;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Pixel Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
        </div>
        <!-- /#page-wrapper -->
        <footer class="footer text-center"> 2020 &copy; Myadmin brought to you by <a
                href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!--Nice scroll JavaScript -->
    <script src="js/jquery.nicescroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/myadmin.js"></script>
</body>

</html>