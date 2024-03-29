<?php
    ob_start();
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    require_once ('config/koneksi.php');
    if( ! isset($_SESSION["nama"])) header("location:form-login");
    include    "headadmin.php";
    include     "config/utility.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <?php echo headadmin(); ?>

    <meta charset="utf-8" />
    <meta name="author" content="Script Tutorials" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Portal Aplikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="images/icon.png">

    <!-- attach CSS styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.js"></script>
    <link href="css/style.css" rel="stylesheet" />
    <!-- menu -->
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style_menu.css"> <!-- Resource style -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <!-- attach JavaScripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mobile.custom.min.js"></script>
    <script src="js/main.js"></script>


    <link rel="stylesheet" href="css/portfolio.jquery.css">
    <script src="js/portfolio.jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('.thumbs').portfolio({
                cols: 3,
                transition: 'slideDown'
            });
        });
    </script>
    <style>
        h1 {
            margin-bottom: 0px;
            margin-top: 30px;
        }
        p {
            line-height: 25px;
        }
        .thumbs {
            display: block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-fixed-top" >
    	<header class="cd-main-header">
    		<ul class="cd-header-buttons">
    			<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
    		</ul> <!-- cd-header-buttons -->
    	</header>
    </nav>

    <nav class="cd-nav" >
		<ul id="cd-primary-nav" class="cd-primary-nav is-fixed" style="z-index: 1200;">
            <li class="dropdown">
                <a  title="Panel Pengaturan Akun" class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <strong style="padding: 2px 0;">
                       <?php
                            if($_SESSION["jenisuser"]=="gi"){
                                $sql=mysql_query("SELECT master.gi.* FROM master.gi WHERE master.gi.kodegi=$_SESSION[kodegi]");
                                $row=mysql_fetch_array($sql); ?>Admin GI
                                <?php
                                echo $row["namagi"];
                            }
                            else if($_SESSION["jenisuser"]=="app"){
                                $sql=mysql_query("SELECT master.app.* FROM master.app WHERE master.app.kodeapp=$_SESSION[kodeapp]");
                                $row=mysql_fetch_array($sql);
                                if($_SESSION["level"]=="manajer"){
                                    ?>Manajer <?php
                                    echo $row["namaapp"];
                                }
                                else if($_SESSION["level"]=="asman"){
                                    ?>Assman <?php
                                    echo $row["namaapp"];
                                }
                                else{
                                    ?>Admin <?php
                                    echo $row["namaapp"];
                                }
                            }
                            else if($_SESSION["jenisuser"]=="apd"){
                                $sql=mysql_query("SELECT master.apd.* FROM master.apd WHERE master.apd.kodeapd=$_SESSION[kodeapd]");
                                $row=mysql_fetch_array($sql); ?>Admin
                                <?php
                                echo $row["namaapd"];
                            }
                            else if($_SESSION["jenisuser"]=="ki"){?>
                                Admin Kantor Induk
                                <?php
                            }
                            else{ ?>
                                Superadmin
                                <?php
                            }
                        ?>
                    </strong> &nbsp; <i class="fa fa-caret-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-user" style="background:rgba(92, 93, 105, 0.95);">
                   <li>
                       <a href="index.php?password"><i class="fa fa-cogs"></i> Ganti Password</a>
                   </li>
                   <li>
                       <a href="#" class="logoutK"><i class="fa fa-power-off"></i> Log out</a>
                   </li>
               </ul>
               <!-- /.dropdown-user -->
           </li>
		</ul> <!-- primary-nav -->
	</nav> <!-- cd-nav -->
    <!-- end menu -->

    <?php
        if(isset($_GET["dashboard"])){ include "dashboard.php";}
        else if (isset($_GET["submit"])){include "submit.php";}
        else if (isset($_GET["password"])){include "gantipassword.php";}

        else { include "notfound.php"; }
    ?>


    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- konfirmasi -->
    <script src="assets/js/custom.js"></script>
    <!-- confirm -->

    <script src="assets/confirmdell/jquery.confirm/jquery.confirm.js"></script>
    <script src="assets/confirmdell/js/script2.js"></script>
</body>
</html>
