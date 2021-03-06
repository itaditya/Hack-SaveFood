<?php

session_start();
if(isset($_SESSION['colg']))
{
header('Location: ../page/colg.php');
}
else if(isset($_SESSION['std']))
{
  header('Location: ../page/std.php');
}


$cookie_name="update";
$cookie_value="0";
if(!isset($_COOKIE[$cookie_name]))
{
  setcookie($cookie_name, $cookie_value, time() + (86400), "/"); 
  require_once '../database.php';
  $bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query="UPDATE std SET stdd=0";
  $bd->query($query);
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>SaveFood | Login</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
    <link href="assets/css/animate.css" rel="stylesheet" />         
    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
    <style type="text/css">
            .nav-tabs > li.active :after {
              border-bottom: 11px solid #262322;
            }
        
            #desc ul li {
              margin-top: 2em;
              padding: 1em;
              line-height: 1.9em;
              background: rgba(162, 156, 130, 0.25);;
              list-style: none;
              border-radius: 2em;
              box-shadow: 7px 8px 16px 0px rgba(0, 0, 0, 0.6);
              text-align: center;
            }
            .nav-tabs > li.active > a {
              color: #fff !important;
            }
            .nav-tabs > li > a {
              color: rgb(190,190,190);
            }
            .register-card {
              box-shadow: 7px 8px 16px 0px rgba(0, 0, 0, 0.6);
            }
            .form-control:focus {
              background-color: #efefef;
            }
    </style>    
</head>
<body>
    <nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SaveFood</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2" onscroll="hide();">
            <form class="register-form" method="post" action="../page/login.php">
          <ul class="nav navbar-nav navbar-right">
            <li>
                    <input type="text" name="id" class="form-control" placeholder="Save-Id">
            </li>
            <li style="padding-left:15px;">
                <button class="btn btn-danger btn-block" onclick="anims('go',jello');" id="go">Login &nbsp;<i class="ion ion-ios-arrow-forward"></i></button>
            </li>
           </ul>
           <?php if(isset($_SESSION['error'])) 
           {
            ?>
           <div class="text-center">
            <?php

            echo '<p style="color:red">'.$_SESSION['error'].'</p>';

            ?>
           </div>
           <?php
         }
         unset($_SESSION['error']);
         ?>
           
           </form>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav> 
    
    <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1 " id="desc">
                          <div class="register-card animated flipInX"  style="max-width:500px;">
                            <img src="assets/paper_img/log.png" class="img-responsive ">
                              <h3 class="text-center"><strong>Lead the Change</strong></h3>
                              <ul style="padding-left:0px;">
                                <li> is an initiative to save precious food with the cooperation of students <strong></strong></li>
                                <li> will help mess lend food to concern authority organizations  <strong></strong></li>
                                <li> Studentscan check their diet and keep a check on their health <strong></strong></li>
                              </ul>
                          </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card animated flipInX">
                                <h3 class="title">Welcome</h3>

                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active"><a href="#org" data-toggle="tab">Organisation</a></li>
                                        <li><a href="#std" data-toggle="tab">Students</a></li>
                                    </ul>
                                    </div>
                                </div>
                                <div id="my-tab-content" class="tab-content">
                                <div class="tab-pane active fadeIn" id="org">
                                <form class="register-form" method="post" action="ho.php">
                                    <label>College Name</label>
                                    <input name="cname" type="text" class="form-control" placeholder="Eg : JSS">

                                    <label>Student Population</label>
                                    <input name="amt" type="int" class="form-control" placeholder="Eg : 539">
                                    <label>Location</label>
                                    <input name="loc" type="text" class="form-control" placeholder="Eg : Noida">
                                    <button class="btn btn-danger btn-block" name="colgr" id="submit">Register</button>
                                </form>
                                <div class="forgot">
                                    <a href="#" class="btn btn-simple btn-danger">Having Trouble?</a>
                                </div>
                                </div>


                                <div class="tab-pane animated fadeIn" id="std">
                                <form class="register-form" method="post" action="ho.php">
                                    <label>Your Name</label>
                                    <input name="sname" type="text" class="form-control" placeholder="Eg : Ankit">

                                    <label>College Save Id</label>
                                    <input name="sid" type="int" class="form-control" placeholder="Eg : JSS-53-s">
                                    <label>Location</label>
                                    <input name="sloc" type="text" class="form-control" placeholder="Eg : Noida">
                                    <button class="btn btn-danger btn-block" name="stdr" id="stdsubmit">Register</button>
                                </form>
                                <div class="forgot">
                                    <a href="#" class="btn btn-simple btn-danger">Having Trouble?</a>
                                </div>
                                </div>
                              </div>


                            </div>
                        </div>
                    </div>
                </div>     
            <div class="footer register-footer text-center">
                    <h6>&copy; 2016, Made with <i class="ion ion-ios-heart" style="color:#EB5E28;"></i> by Room 340</h6>
            </div>
        </div>
    </div>      

</body>

<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<script src="assets/js/ct-paper.js"></script> 
<script type="text/javascript">
  function anims(id,anim) {
    console.log('1');
    document.getElementById(id).classList.add('animated');
    document.getElementById(id).classList.add(anim);
    console.log('2');
  }
</script>   
</html>