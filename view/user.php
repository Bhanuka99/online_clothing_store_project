<?php

include_once '../commons/session.php';
include_once '../model/module_model.php';


// to get user information from session

$userrow=$_SESSION["user"];

$moduleObj = new Module();

$moduleresult = $moduleObj->getAllModules();

// print_r($moduleresult);




?>


<html>
    <head>
        <?php include_once "../includes/bootstrap_css_includes.php"; ?>
    </head>
    <body>
        <div class="container">
                <?php $pageName = "USER MANAGEMENT"; ?>
            <?php include_once "../includes/header_row_includes.php"; ?>
           
            <div class="col-md-3">
                <ul class="list-group">
                    <a href="add-user.php" class="list-group-item">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;
                        Add User
                    </a>
                    <a href="view-users.php" class="list-group-item">
                        <span class="glyphicon glyphicon-search"></span>&nbsp;
                        View User
                    </a>
                    <a href="generate-user-reports.php" class="list-group-item">
                        <span class="glyphicon glyphicon-book"></span>&nbsp;
                        Generate User Reports
                    </a>
                </ul>
            </div>
            
            <div class="col-md-9">
                <div class="col-md-6">
                    <div class="panel panel-info" style="height: 180px">
                        <div class="panel-heading">
                            <p align="center">No of Active Users</p>
                        </div>
                        <div class="panel-body">
                            <h1 class="h1" align="center">5</h1>
                        </div>
                    </div>      
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info" style="height: 180px">
                        <div class="panel-heading">
                            <p align="center">No of De-Active Users</p>
                        </div>
                        <div class="panel-body">
                            <h1 class="h1" align="center">3</h1>
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </body>
    <script src="../js/jquery-37.1.js"></script>
    
</html>