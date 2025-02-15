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
    <?php include_once "../includes/bootstrap_css_includes.php"; ?>
</head>
<body>
    <div class="container">
        <?php $pageName = "DASHBOARD"; ?>

        <?php include_once "../includes/header_row_includes.php"; ?>
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