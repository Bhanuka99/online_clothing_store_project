
<?php

include_once '../commons/session.php';
include_once '../model/user_model.php';


// to get user information from session

$userrow=$_SESSION["user"];
//get all roles
$roleObj = new Roles();
$roleResult = $roleObj->getAllRoles();

$user_id = base64_decode($_GET["user_id"]);
$userResult = $roleObj->getUser($user_id);

$user_row = $userResult->fetch_assoc();

//getting already asigned user functions
$functionArray = array();
$userFunctionResult = $roleObj->getUserFunctions($user_id);
while ($fun_row=$userFunctionResult->fetch_assoc()) {
    array_push($functionArray, $fun_row["function_id"]);
}
print_r($functionArray);
?>


<html>
    <head>
        <?php include_once "../includes/bootstrap_css_includes.php"; ?>
    </head>
    <body>
        <div class="container">
                <?php $pageName = "Edit User"; ?>
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
            <form action="../controller/user_controller.php?status=add_user" method="post" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" id="msg">  
                        </div>
                        <?php 
                        if (isset($_GET["msg"])) {
                        ?>
                        <div class="col-md-6 col-md-offset-3 alert alert-danger">
                            <?php echo base64_decode($_GET["msg"]); ?>
                        </div>
                        <?php
                        } 
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">First Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="fname" id="fname" value="<?php echo $user_row["user_fname"] ;?>" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="lname" id="lname"value="<?php echo $user_row["user_lname"] ;?>" />
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="email"  class="form-control" name="email" id="email" value="<?php echo $user_row["user_email"] ;?>" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">DOB</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date"  class="form-control" name="dob" id="dob" value="<?php echo $user_row["user_dob"] ;?>" />
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">NIC</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="nic" id="nic"value="<?php echo $user_row["user_nic"] ;?>" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Image</label>
                        </div>
                        <div class="col-md-3">
                            <input type="file"  class="form-control" name="user_image" id="user_image" onchange="displayImage(this);"/>
                            <br/>
                            <?php 
                            if ($user_row["user_image"]!="") {
                                $image = $user_row["user_image"];
                            ?>
                            <img id="img_prev" src="../images/user_images/<?php echo $image ?>" width="60px" height="80px"/>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Land line no</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="cno1" id="cno1"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Mobile No</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="cno2" id="cno2"/>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">User Role</label>
                        </div>
                        <div class="col-md-3">
                            <select name="user_role" id="user_role" class="form-control">
                                <option value="">---</option>
                                <?php
                                while($role_row = $roleResult->fetch_assoc()){ 
                                ?>
                                <option value="<?php echo $role_row['role_id'] ?>"
                                    <?php
                                        if ($role_row["role_id"] == $user_row["user_role"]) {
                                    ?>
                                    Selected 
                                    <?php 
                                        }
                                        ?>
                                    >
                                    <?php echo $role_row['role_name'] ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">&nbsp;</div>
                </div>
                <div class="row">
                    <div id="display_functions">
                        <?php
                        $role_id = $user_row["user_role"];
                        $moduleResult = $roleObj->getRoleModule($role_id);
                
                        while ($module_row = $moduleResult->fetch_assoc()) {
                            $module_id = $module_row["module_id"];
                            $functionResults = $roleObj->getModuleFunctions($module_id);
                            ?>
                            <div class="col-md-4">
                                <h4>
                                    <?php
                                    echo $module_row["module_name"];
                                    echo "<br/>";
                                    ?>
                                </h4>
                                <?php
                                while ($function_row = $functionResults->fetch_assoc()) {
                                    ?>
                                    <input type="checkbox" name="fun[]" value="<?php echo $function_row["function_id"] ?>" checked>
                                    <?php
                                    echo $function_row["function_name"];
                                    ?>
                                    <br>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } 
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </div>
                </div>
                </div>
             </form>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
    </body>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/uservalidation.js"></script>
    <script>
        function displayImage(input){
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                $("#img_prev").attr('src',e.target.result)
                        .width(80)
                        .height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>