<?php 
include_once '../commons/session.php';
include_once '../model/module_model.php';


// to get the user
$userrow=$_SESSION["user"];
$moduleObj = new Module();

$moduleResult = $moduleObj->getAllModules();

?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
</head>
<body>
    <div class="container">
        <div class="row" style="height: 40px;">&nbsp;</div>
        <div class="row" style="height:75px">
        <div class="col-md-3" >
            <img src="../images/logo.png" width="70px" height="80px"/>
        </div>
        <div class="col-md-6">
            <h1 align ="center">Online Clothestore</h1>
        </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3" >
                <?php echo ucwords($userrow["user_fname"]." ".$userrow["user_lname"]) ?>
            </div>
            <div class="col-md-6">
                <h4 align ="center">Online Clothestore</h4>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <a href="" class="btn btn-primary">Log out</a>
            </div>  
        </div> 
        <hr>
        <?php
            while($module_row = $moduleResult->fetch_assoc()){ 
        ?>
        <a href="<?php echo $module_row['module_url'] ?>">
        <div class="col-md-4" style="text-decoration:none; color:#FFF;">
            <div class="panel" style="height:170px; background-color: #209985;">
                <h1 align="center">
                    <img src="../images/icons/<?php echo $module_row['module_icon'] ?>" height="100px" width="80px" alt="usericon">
                </h1>
                <h4 align="center"><?php echo $module_row['module_name'] ?></h4>
            </div>
        </div> 
        </a>
        <?php
            }
        ?>
    </div>    
</body>
<script src="../js/jquery-3.7.1.js"></script>
<!-- <script src="../js/loginvalidation.js"></script> -->
</html>