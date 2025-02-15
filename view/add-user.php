
<?php

include_once '../commons/session.php';
include_once '../model/user_model.php';


// to get user information from session

$userrow=$_SESSION["user"];
//get all roles
$roleObj = new Roles();
$roleResult = $roleObj->getAllRoles();

?>


<html>
    <head>
        <?php include_once "../includes/bootstrap_css_includes.php"; ?>
    </head>
    <body>
        <div class="container">
                <?php $pageName = "ADD USER"; ?>
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
            <form>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">First Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="fname" id="fname"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="lname" id="lname"/>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="email"  class="form-control" name="email" id="email"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">DOB</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date"  class="form-control" name="dob" id="dob"/>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">NIC</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="nic" id="nic"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Image</label>
                        </div>
                        <div class="col-md-3">
                            <input type="file"  class="form-control" name="user_image" id="user_image" onchange="displayImage(this);"/>
                            <br/>
                            <img id="img_prev"/>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Contact no 1</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" name="cno1" id="cno1"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Contact no 2</label>
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
                            <select name="user_row" id="user_row" class="form-control" required="required">
                                <option value="">---</option>
                                <?php
                                while($role_row = $roleResult->fetch_assoc()){ 
                                ?>
                                <option value="<?php echo $role_row['role_id'] ?>">
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
                        
                    </div>
                </div>
             </form>
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