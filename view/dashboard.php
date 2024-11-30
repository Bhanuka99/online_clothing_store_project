<?php 
include_once '../commons/session.php';

// to get the user
$userrow=$_SESSION["user"];
?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
</head>
<body>
    <div clss="container">
        <div class="row" style="height: 40px;">&nbsp;</div>
        <div class="row" style="height:75px">
        <div class="col-md-2 col-md-offset-1" >
            <img src="../images/logo.png" width="70px" height="80px"/>
        </div>
        <div class="col-md-6">
            <h1 align ="center">Online Clothestore</h1>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-2 col-md-offset-1" >
            <?php echo ucwords($userrow["user_fname"]." ".$userrow["user_lname"]) ?>
        </div>
        <div class="col-md-6">
        <h4 align ="center">Online Clothestore</h4>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <a href="" class="btn btn-primary">Log out</a>
        </div>  
        </div>    
    </div>    
</body>
<script src="../js/jquery-3.7.1.js"></script>
<!-- <script src="../js/loginvalidation.js"></script> -->
</html>